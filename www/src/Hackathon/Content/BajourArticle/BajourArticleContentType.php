<?php

namespace Hackathon\Content\BajourArticle;

use Hackathon\Data\BajourArticle\BajourArticleReader;
use Hackathon\Data\BajourArticle\BajourArticleRow;
use Nemundo\Content\Index\News\NewsIndexTrait;
use Nemundo\Content\Type\AbstractContentType;

class BajourArticleContentType extends AbstractContentType
{

    use NewsIndexTrait;

    protected function loadContentType()
    {
        $this->typeLabel = 'Bajour Article';
        $this->typeId = 'a547dd1a-2a5a-435f-9460-77eaaba0683b';

        $this->viewClassList[] = BajourArticleContentView::class;
    }


    protected function onDataRow()
    {
        $this->dataRow = (new BajourArticleReader())->getRowById($this->getDataId());
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|BajourArticleRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getUniqueId()
    {
        return $this->getDataRow()->uniqueId;
    }

    public function getTitle()
    {
        return $this->getDataRow()->title;
    }

    public function getLead()
    {
        return $this->getDataRow()->lead;
    }

    public function getUrl()
    {
        return $this->getDataRow()->url;
    }

    public function getSource()
    {
        return 'Article';
        // TODO: Implement getSource() method.
    }

    public function getSourceUniqueId()
    {

        return '0';

        // TODO: Implement getSourceUniqueId() method.
    }

}