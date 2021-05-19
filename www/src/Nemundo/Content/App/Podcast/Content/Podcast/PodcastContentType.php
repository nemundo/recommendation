<?php

namespace Nemundo\Content\App\Podcast\Content\Podcast;

use Nemundo\Content\App\Podcast\Content\Episode\EpisodeContentType;
use Nemundo\Content\App\Podcast\Data\Episode\EpisodeReader;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastDelete;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastReader;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastRow;
use Nemundo\Content\Type\AbstractContentType;

class PodcastContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Podcast';
        $this->typeId = '1ea9743c-703e-44f2-a696-cd90639e4908';
        $this->formClassList[] = PodcastContentForm::class;
        $this->viewClassList[] = PodcastContentView::class;
    }



    protected function onDelete()
    {


        $reader = new EpisodeReader();
        $reader->filter->andEqual($reader->model->podcastId,$this->getDataId());
        foreach ($reader->getData() as $episodeRow) {
            (new EpisodeContentType($episodeRow->id))->deleteType();
        }

        (new PodcastDelete())->deleteById($this->getDataId());

    }


    protected function onDataRow()
    {
        $this->dataRow=(new PodcastReader())->getRowById($this->getDataId());
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|PodcastRow
     */
    public function getDataRow()
    {

        return parent::getDataRow();

    }

    public function getSubject()
    {
      return $this->getDataRow()->podcast;
    }


}