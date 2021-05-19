<?php

namespace Nemundo\Content\App\File\Content\WebFile;

use Nemundo\Content\App\File\Content\File\AbstractFileContentType;
use Nemundo\Content\App\File\Content\File\FileContentForm;
use Nemundo\Content\App\File\Data\File\File;
use Nemundo\Content\App\File\Data\WebFile\WebFile;
use Nemundo\Content\App\File\Data\WebFile\WebFileReader;
use Nemundo\Content\App\File\Data\WebFile\WebFileRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Model\Data\Property\File\FileProperty;

class WebFileContentType extends AbstractFileContentType
{

    /**
     * @var FileProperty
     */
   // public $file;

    /*

    public function __construct($dataId = null)
    {

        parent::__construct($dataId);
        $this->file = new FileProperty();

    }*/


    protected function loadContentType()
    {
        $this->typeLabel = 'Web File';
        $this->typeId = '2fe0c25f-477b-4c2b-b0f4-223c11b41d53';
        $this->formClassList[] = FileContentForm::class; // WebFileContentForm::class;
        $this->viewClassList[] = WebFileContentView::class;
    }


    protected function onCreate()
    {

        $data = new WebFile();
        $data->file->fromFileProperty($this->file);
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow=(new WebFileReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|WebFileRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {
        return $this->getDataRow()->file->getFilename();

    }


}