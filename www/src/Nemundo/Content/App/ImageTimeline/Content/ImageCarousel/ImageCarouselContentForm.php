<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageCarousel;

use Nemundo\Content\App\ImageTimeline\Com\ListBox\ImageTimelineListBox;
use Nemundo\Content\App\ImageTimeline\Data\ImageCarousel\ImageCarousel;
use Nemundo\Content\App\ImageTimeline\Data\ImageCarousel\ImageCarouselUpdate;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Package\Bootstrap\FormElement\BootstrapNumberBox;

class ImageCarouselContentForm extends AbstractContentForm
{
    /**
     * @var ImageCarouselContentType
     */
    public $contentType;

    /**
     * @var ImageTimelineListBox
     */
    private $imageTimeline;

    /**
     * @var BootstrapNumberBox
     */
    private $imageCount;

    public function getContent()
    {

        $this->imageTimeline = new ImageTimelineListBox($this);
        $this->imageTimeline->validation = true;

        $this->imageCount = new BootstrapNumberBox($this);
        $this->imageCount->label = 'Image Count';
        $this->imageCount->validation = true;


        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $dataRow = $this->contentType->getDataRow();

        $this->imageTimeline->value = $dataRow->imageTimelineId;
        $this->imageCount->value = $dataRow->imageCount;


    }


    public function onSubmit()
    {

        if ($this->contentType->getDataId() == null) {

            $data = new ImageCarousel();
            $data->imageTimelineId = $this->imageTimeline->getValue();
            $data->imageCount = $this->imageCount->getValue();
            $dataId = $data->save();

            (new ContentIndexBuilder(new ImageCarouselContentType($dataId)))->buildIndex();

        } else {

            $update = new ImageCarouselUpdate();
            $update->imageTimelineId = $this->imageTimeline->getValue();
            $update->imageCount = $this->imageCount->getValue();
            $update->updateById($this->contentType->getDataId());

        }

    }
}