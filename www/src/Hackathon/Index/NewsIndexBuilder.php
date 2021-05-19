<?php


namespace Hackathon\Index;


use Hackathon\Data\NewsIndex\NewsIndex;
use Hackathon\Data\NewsIndex\NewsIndexId;
use Hackathon\Data\NewsType\NewsTypeId;
use Hackathon\Data\SourceIndex\SourceIndex;
use Hackathon\Data\SourceIndex\SourceIndexId;
use Hackathon\Data\Word\Word;
use Hackathon\Data\Word\WordId;
use Hackathon\Data\WordIndex\WordIndex;
use Nemundo\Content\Index\News\NewsIndexTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;

class NewsIndexBuilder extends AbstractIndexBuilder
{

    /*
        public $title;

        public $text;

        public $url;

        public $source;

        public $sourceUniqueId;*/


    /**
     * @var AbstractContentType|NewsIndexTrait
     */
    protected $contentType;


    public function buildIndex()
    {


        $id = new NewsTypeId();
        $id->filter->andEqual($id->model->contentTypeId, $this->contentType->typeId);
        $newsTypeId = $id->getId();

        //(new Debug())->write('create index');


        $data = new SourceIndex();
        $data->updateOnDuplicate = true;
        $data->source = $this->contentType->getSource();
        $data->uniqueUrl = $this->contentType->getSourceUniqueId();
        $data->newsTypeId = $newsTypeId;
        $data->save();

        $id = new SourceIndexId();
        $id->filter->andEqual($id->model->uniqueUrl, $this->contentType->getSourceUniqueId());
        $sourceId = $id->getId();




        $data = new NewsIndex();
        $data->updateOnDuplicate = true;
        $data->title = $this->contentType->getTitle();
        $data->description = $this->contentType->getLead();
        $data->url = $this->contentType->getUrl();
        $data->sourceId = $sourceId;
        $data->newsTypeId = $newsTypeId;
        $data->save();


        $id = new NewsIndexId();
        $id->filter->andEqual($id->model->url, $this->contentType->getUrl());
        $indexId = $id->getId();


        $list = new \Nemundo\Core\Text\KeywordList();
        $list->addInputText = false;
        foreach ($list->getKeywordList($this->contentType->getTitle() . ' ' . $this->contentType->getLead()) as $word) {
            //(new \Nemundo\Core\Debug\Debug())->write($word);

            $data = new Word();
            $data->ignoreIfExists = true;
            $data->word = $word;
            $data->save();

            $id = new WordId();
            $id->filter->andEqual($id->model->word, $word);
            $wordId = $id->getId();

            $data = new WordIndex();
            $data->wordId = $wordId;
            $data->newsId = $indexId;
            $data->save();


        }


    }


    public function deleteIndex()
    {
        // TODO: Implement deleteIndex() method.
    }


}