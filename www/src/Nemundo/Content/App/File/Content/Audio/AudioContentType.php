<?php

namespace Nemundo\Content\App\File\Content\Audio;

use Nemundo\Content\App\File\Content\File\AbstractFileContentType;
use Nemundo\Content\App\File\Content\File\UrlFileContentForm;
use Nemundo\Content\App\File\Data\Audio\Audio;
use Nemundo\Content\App\File\Data\Audio\AudioReader;
use Nemundo\Content\App\File\Data\Audio\AudioRow;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;

class AudioContentType extends AbstractFileContentType
{

    protected function loadContentType()
    {
        $this->typeLabel = 'Audio';
        $this->typeId = '10039af8-4345-4019-89f7-aa3c030475fc';
        $this->formClassList[] = AudioContentForm::class;
        $this->formClassList[] = UrlFileContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = AudioContentView::class;
    }


    protected function onCreate()
    {

        $data = new Audio();
        $data->audio->fromFileProperty($this->file);
        $data->orginalFilename = $this->file->getOrginalFilename();
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow = (new AudioReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|AudioRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->orginalFilename;
    }

}