<?php

namespace Nemundo\Content\Index\Search\Reader;


use Nemundo\Com\Pagination\PaginationTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Text\SnippetText;
use Nemundo\Core\Text\TextBold;
use Nemundo\Core\Text\WordList;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Db\Sql\Parameter\SqlStatement;

class SearchItemReader extends AbstractDataSource
{

    use PaginationTrait;

    public $query;

    /**
     * @var bool
     */
    public $returnEmptyResult = false;

    /**
     * @var AbstractContentType[]
     */
    private $filterContentTypeList = [];


    public function __construct()
    {

        $this->loadPageRequest();

    }


    public function addFilterContentType(AbstractContentType $contentType)
    {

        $this->filterContentTypeList[] = $contentType;
        return $this;

    }


    public function getFormatCount()
    {

    }


    public function getTotalCount()
    {


        if ($this->totalCount == null) {

            $this->totalCount = 0;

            if ($this->hasValue() || $this->returnEmptyResult) {

                $sql = 'SELECT COUNT(1) total_count FROM (SELECT COUNT(1) count_field 
FROM content_search_index';

                $reader = new SqlReader();
                $reader->sqlStatement->sql = $sql;
                $reader->sqlStatement = $this->getWhere($reader->sqlStatement);

                $this->totalCount = $reader->getRow()->getValue('total_count');

            }

        }

        return $this->totalCount;

    }


    protected function loadData()
    {

        if ($this->hasValue() || $this->returnEmptyResult) {

            $reader = new SqlReader();

            $sql = 'SELECT * FROM (SELECT COUNT(1) count_field, content, subject, content_search_index.content_type, content_content_type.content_type content_type_label, php_class, data_id 
FROM content_search_index 
LEFT JOIN content_content_type ON content_search_index.content_type=content_content_type.id
LEFT JOIN content_content ON content_search_index.content=content_content.id ';

            $reader->sqlStatement->sql = $sql;
            $reader->sqlStatement = $this->getWhere($reader->sqlStatement);

            $reader->sqlStatement->sql .= ' ORDER BY subject';

            $limitStart = ($this->currentPage) * $this->paginationLimit;
            $reader->sqlStatement->sql .= ' LIMIT ' . $limitStart . ',' . $this->paginationLimit;

            $bold = new TextBold();
            $bold->addSearchQuery($this->query);

            foreach ($reader->getData() as $sqlRow) {

                $searchItem = new SearchItem();

                $className = $sqlRow->getValue('php_class');
                $dataId = $sqlRow->getValue('data_id');

                if (class_exists($className)) {

                    /** @var AbstractContentType $contentType */
                    $contentType = new $className($dataId);

                    $searchItem->subject = $bold->getBoldText($contentType->getSubject());

                    $snippet = new SnippetText();
                    $textSnippet = $snippet->getSnippet($this->query, $contentType->getText());
                    $searchItem->text = $bold->getBoldText($textSnippet);
                    $searchItem->site = $contentType->getViewSite();
                    $searchItem->typeLabel = $sqlRow->getValue('content_type_label');
                    $searchItem->dataId = $dataId;
                    $searchItem->contentId = $sqlRow->getValue('content');

                    $this->addItem($searchItem);

                } else {
                    (new LogMessage())->writeError('Content Type not found. Class: ' . $className);
                }

            }

        }

    }


    /**
     * @return SearchItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


    private function hasValue()
    {

        $this->query = trim($this->query);

        $hasValue = false;
        if ($this->query !== '') {
            $hasValue = true;
        }

        return $hasValue;

    }


    private function getWhere(SqlStatement $sqlStatement)
    {

        if ($this->hasValue()) {

            $keywordList = new WordList($this->query);

            $n = 1;
            $sqlStatement->sql .= ' WHERE (';
            foreach ($keywordList->getHashList() as $value) {

                $parameterName = 'para_word' . $n;
                $sqlStatement->sql .= 'word = :' . $parameterName;

                $sqlStatement->addParameter($parameterName, $value, 'word');

                if ($n < $keywordList->getWordCount()) {
                    $sqlStatement->sql .= ' OR ';
                }

                $n++;

            }
            $sqlStatement->sql .= ')';

            $this->getContentTypeWhere($sqlStatement, true);
            $sqlStatement->sql .= ' GROUP BY content_search_index.content) data WHERE count_field=' . $keywordList->getWordCount();

        } else {

            $sqlStatement->sql .= ' WHERE ';

            $this->getContentTypeWhere($sqlStatement, false);
            $sqlStatement->sql .= ' GROUP BY content_search_index.content) data';
        }

        return $sqlStatement;

    }


    private function getContentTypeWhere(SqlStatement $sqlStatement, $addAnd = false)
    {

        $sql = '';

        $filterContentTypeCount = sizeof($this->filterContentTypeList);
        if ($filterContentTypeCount > 0) {

            if ($addAnd) {
                $sql .= ' AND ';
            }

            $sql .= '(';

            $n = 0;
            foreach ($this->filterContentTypeList as $contentType) {

                $parameterName = 'content_type_' . $n;
                $sql .= 'content_search_index.content_type = :' . $parameterName;
                $sqlStatement->addParameter($parameterName, $contentType->typeId, 'content_type');
                $n++;

                if ($filterContentTypeCount > $n) {
                    $sql .= ' OR ';
                }

            }

            $sql .= ')';

            $sqlStatement->sql .= $sql;

        }

        return $sqlStatement;


    }


    public function getContentTypeList()
    {

        /** @var ContentTypeResultItem[] $resultList */
        $resultList = [];

        if ($this->hasValue()) {

            $reader = new SqlReader();

            $sql = 'SELECT COUNT(1) content_type_count, data.* FROM (SELECT COUNT(1) count_field, content, content_search_index.content_type, content_content_type.content_type content_type_label 
FROM content_search_index 
LEFT JOIN content_content_type ON content_search_index.content_type=content_content_type.id';

            $reader->sqlStatement->sql = $sql;
            $reader->sqlStatement = $this->getWhere($reader->sqlStatement);
            $reader->sqlStatement->sql .= ' GROUP BY content_type';

            foreach ($reader->getData() as $dataRow) {

                $item = new ContentTypeResultItem();
                $item->contentTypeLabel = $dataRow->getValue('content_type_label');
                $item->contentTypeId = $dataRow->getValue('content_type');
                $item->resultCount = $dataRow->getValue('content_type_count');
                $resultList[] = $item;

            }
        }

        return $resultList;

    }

}