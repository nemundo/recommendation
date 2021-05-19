<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Model\ModelConfig;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\Number\NumberType;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Web\Site\AbstractSite;

class RedirectFilenameType extends AbstractComplexType
{

    /**
     * @var RedirectFileType
     */
    public $file;

    /**
     * @var TextType
     */
    public $fileName;

    /**
     * @var NumberType
     */
    public $fileSize;

    /**
     * @var TextType
     */
    public $fileExtension;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    protected function loadExternalType()
    {

        $this->fieldMapping = false;

        $this->file = new RedirectFileType();
        $this->addType($this->file);

        $this->fileName = new TextType();
        $this->addType($this->fileName);

        $this->fileSize = new NumberType();
        $this->fileSize->label = 'File Size';
        $this->addType($this->fileSize);

        $this->fileExtension = new TextType();
        $this->fileExtension->length = 10;
        $this->addType($this->fileExtension);

    }


    public function createObject()
    {

        $this->file->redirectSite = $this->redirectSite;

        $this->file->fieldName = $this->fieldName . '_file';
        $this->file->aliasFieldName = $this->fieldName . '_file';
        $this->file->tableName = $this->tableName;
        $this->file->allowNullValue = $this->allowNullValue;

        $this->fileName->fieldName = $this->fieldName . '_filename';
        $this->fileName->aliasFieldName = $this->fieldName . '_filename';
        $this->fileName->tableName = $this->tableName;
        $this->fileName->allowNullValue = $this->allowNullValue;

        $this->fileSize->fieldName = $this->fieldName . '_filesize';
        $this->fileSize->aliasFieldName = $this->fieldName . '_filesize';
        $this->fileSize->tableName = $this->tableName;
        $this->fileSize->allowNullValue = $this->allowNullValue;

        $this->fileExtension->fieldName = $this->fieldName . '_extension';
        $this->fileExtension->aliasFieldName = $this->fieldName . '_extension';
        $this->fileExtension->tableName = $this->tableName;
        $this->fileExtension->allowNullValue = $this->allowNullValue;

    }


    public function getDataPath()
    {
        $path = ModelConfig::$redirectDataPath . $this->tableName . DIRECTORY_SEPARATOR . $this->fieldName . DIRECTORY_SEPARATOR;
        return $path;
    }

}
