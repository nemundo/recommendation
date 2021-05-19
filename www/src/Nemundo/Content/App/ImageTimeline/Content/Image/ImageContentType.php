<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Image;

use Nemundo\Content\App\ImageTimeline\Data\Image\ImageDelete;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageRow;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;

class ImageContentType extends AbstractContentType
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Image';
        $this->typeId = 'cc6ad885-4a31-47ec-baf6-89f7b6fc63b5';
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = ImageContentView::class;

    }


    protected function onDelete()
    {
        (new ImageDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {
        $reader = new ImageReader();
        $reader->model->loadTimeline();
        $this->dataRow = $reader->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ImageRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $imageRow = $this->getDataRow();

        $subject = $imageRow->dateTime->getShortDateTimeLeadingZeroFormat();
        return $subject;

    }

}