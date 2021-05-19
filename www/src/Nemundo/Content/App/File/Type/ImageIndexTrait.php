<?php


namespace Nemundo\Content\App\File\Type;


use Nemundo\Content\App\File\Data\ImageIndex\ImageIndex;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;

trait ImageIndexTrait
{

    /**
     * @return string
     */
    abstract protected function getImageFilename();

    protected function saveImageIndex()
    {

        $data = new ImageIndex();
        $data->contentId = $this->getContentId();
        $data->image->fromFilename($this->getImageFilename());
        $data->save();

    }


}