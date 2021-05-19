<?php

namespace Nemundo\Srf\Content\TvEpisode;

use Nemundo\Content\Type\Index\AbstractIndexBuilder;
use Nemundo\Srf\Content\Base\AbstractEpisodeContentType;
use Nemundo\Srf\Data\Episode\Episode;
use Nemundo\Srf\Data\Episode\EpisodeDelete;
use Nemundo\Srf\Data\Episode\EpisodeReader;
use Nemundo\Srf\Data\Episode\EpisodeRow;

class TvEpisodeContentType extends AbstractEpisodeContentType
{

    protected function loadContentType()
    {

        parent::loadContentType();

        $this->typeLabel = 'Srf Video';
        $this->typeId = '5a89df1d-af07-4400-9a8c-9a3d7c3815b9';

    }


    protected function onCreate()
    {

        $data = new Episode();
        $data->showId = $this->showId;
        $data->title = $this->title;
        $data->description = $this->description;
        $data->urn = $this->urn;
        $data->length = $this->length;
        $data->dateTime = $this->episodeDateTime;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

    }


    protected function onIndex()
    {


        /*foreach (TvEpisodeContentType::$indexBuilderClass as $className) {

            //(new Debug())->write('class name'. $className);


            /** @var AbstractIndexBuilder $builder */
          /*  $builder = new $className($this);
            $builder->buildIndex();

        }*/


        /*
        $episodeRow = $this->getDataRow();
        $this->addSearchText($episodeRow->title);
        $this->addSearchText($episodeRow->description);
        $this->saveSearchIndex();


        (new Debug())->write( $episodeRow->title);


        $builder=new NewsIndexBuilder();
        $builder->sourceUniqueId=$episodeRow->showId;
        $builder->source=$episodeRow->show->show;
        $builder->title=$episodeRow->title;
        $builder->text=$episodeRow->description;
        $builder->url ='https://www.srf.ch/play/embed?urn='.$episodeRow->urn;  // 'https://www.srf.ch';
        $builder->createIndex();
*/


        /*
         *
         * <iframe width="560" height="315" src="https://www.srf.ch/play/embed?urn=urn:srf:video:5f787407-de71-4ce7-b9ea-fef6b81f7174&subdivisions=false" allowfullscreen allow="geolocation *; autoplay; encrypted-media"></iframe>
         *
         *
        $data=new NewsIndex();
        $data->title = $episodeRow->title;
        $data->description=$episodeRow->description;
        $data->url='https://www.srf.ch';
        $indexId = $data->save();




        $list=new \Nemundo\Core\Text\KeywordList();
        $list->addInputText=false;
        foreach ($list->getKeywordList($episodeRow->title.' '.$episodeRow->description) as $word) {
            //(new \Nemundo\Core\Debug\Debug())->write($word);

            $data=new Word();
            $data->ignoreIfExists=true;
            $data->word=$word;
            $data->save();

            $id=new WordId();
            $id->filter->andEqual($id->model->word, $word);
            $wordId=$id->getId();

            $data=new WordIndex();
            $data->wordId=$wordId;
            $data->newsId=$indexId;
            $data->save();



        }*/


    }


    protected function onDelete()
    {
        parent::onDelete();
        (new EpisodeDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {

        $episodeReader = new EpisodeReader();
        $episodeReader->model->loadShow();
        $this->dataRow = $episodeReader->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|EpisodeRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }

    public function getText()
    {
        return $this->getDataRow()->description;
    }


    public function getSource()
    {
        return $this->getDataRow()->show->show;
    }


    public function getSourceUniqueId()
    {
        return $this->getDataRow()->show->id;
        // TODO: Implement getSourceUniqueId() method.
    }


    /*
    public function existItem()
    {

        if (parent::existItem())

        $value = false;

        $count = new EpisodeCount();
        $count->filter->andEqual($count->model->urn, $this->urn);
        if ($count->getCount() > 0) {
            $value = true;

            $id = new EpisodeId();
            $id->filter->andEqual($count->model->urn, $this->urn);
            $this->dataId = $id->getId();

        }

        return $value;

    }*/

}