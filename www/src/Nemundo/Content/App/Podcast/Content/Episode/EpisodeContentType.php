<?php

namespace Nemundo\Content\App\Podcast\Content\Episode;

use Nemundo\Content\App\Podcast\Data\Episode\EpisodeDelete;
use Nemundo\Content\App\Podcast\Data\Episode\EpisodeReader;
use Nemundo\Content\App\Podcast\Data\Episode\EpisodeRow;
use Nemundo\Content\Form\ContentFormPart;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;

class EpisodeContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Episode';
        $this->typeId = '8cbdfaee-c235-480c-a169-a6e28041f8e1';

        //$this->formClassList[] = EpisodeContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->formPartClass = ContentFormPart::class;
        $this->viewClassList[] = EpisodeContentView::class;

    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {

        (new EpisodeDelete())->deleteById($this->getDataId());

    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {

        $episodeReader = new EpisodeReader();
        $episodeReader->model->loadPodcast();
        $this->dataRow = $episodeReader->getRowById($this->getDataId());

    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|EpisodeRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getTypeLabel()
    {
        return $this->getDataRow()->podcast->podcast;
    }


    public function getSubject()
    {

        return $this->getDataRow()->title;

    }


}