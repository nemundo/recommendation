<?php

namespace Nemundo\Content\App\File\Content\Video;

use Nemundo\Content\App\File\Content\File\AbstractFileContentType;
use Nemundo\Content\App\File\Content\File\UrlFileContentForm;
use Nemundo\Content\App\File\Data\Video\Video;
use Nemundo\Content\App\File\Data\Video\VideoReader;
use Nemundo\Content\App\File\Data\Video\VideoRow;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;

class VideoContentType extends AbstractFileContentType
{

    protected function loadContentType()
    {
        $this->typeLabel = 'Video';
        $this->typeId = '60a074d7-15f1-44fb-8a87-1900862da3ed';
        $this->formClassList[] = VideoContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->formClassList[]=UrlFileContentForm::class;
        $this->viewClassList[]  = VideoContentView::class;
        $this->formPartClass=VideoContentFormPart::class;
    }


    protected function onCreate()
    {

        $data = new Video();
        $data->video->fromFileProperty($this->file);
        $data->orginalFilename = $this->file->getOrginalFilename();
        $this->dataId = $data->save();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new VideoReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|VideoRow
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