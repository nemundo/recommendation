<?php


namespace Nemundo\Content\App\File\Type;


use Nemundo\Content\App\File\Data\FileIndex\FileIndex;
use Nemundo\Content\App\File\Data\ImageIndex\ImageIndex;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;

trait FileIndexTrait
{

    /**
     * @return string
     */
    //abstract protected function getImageFilename();

    protected function saveFileIndex()
    {

        $data = new FileIndex();
        $data->parentId = $this->getParentId();
        $data->fileId = $this->getDataId();
        //$data->image->fromFilename($this->getImageFilename());
        $data->save();

    }


}