<?php
namespace Nemundo\Content\App\File\Data\Image;
class ImageExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fileExtension;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $imageWidth;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $imageHeight;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $fileSize;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $orginalFilename;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageModel::class;
$this->externalTableName = "file_image";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->image = new \Nemundo\Model\Type\File\ImageType();
$this->image->fieldName = "image";
$this->image->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->image->externalTableName = $this->externalTableName;
$this->image->aliasFieldName = $this->image->tableName . "_" . $this->image->fieldName;
$this->image->label = "Image";
$this->addType($this->image);

$this->fileExtension = new \Nemundo\Model\Type\Text\TextType();
$this->fileExtension->fieldName = "file_extension";
$this->fileExtension->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileExtension->externalTableName = $this->externalTableName;
$this->fileExtension->aliasFieldName = $this->fileExtension->tableName . "_" . $this->fileExtension->fieldName;
$this->fileExtension->label = "File Extension";
$this->addType($this->fileExtension);

$this->imageWidth = new \Nemundo\Model\Type\Number\NumberType();
$this->imageWidth->fieldName = "image_width";
$this->imageWidth->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageWidth->externalTableName = $this->externalTableName;
$this->imageWidth->aliasFieldName = $this->imageWidth->tableName . "_" . $this->imageWidth->fieldName;
$this->imageWidth->label = "Image Width";
$this->addType($this->imageWidth);

$this->imageHeight = new \Nemundo\Model\Type\Number\NumberType();
$this->imageHeight->fieldName = "image_height";
$this->imageHeight->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageHeight->externalTableName = $this->externalTableName;
$this->imageHeight->aliasFieldName = $this->imageHeight->tableName . "_" . $this->imageHeight->fieldName;
$this->imageHeight->label = "Image Height";
$this->addType($this->imageHeight);

$this->fileSize = new \Nemundo\Model\Type\Number\NumberType();
$this->fileSize->fieldName = "file_size";
$this->fileSize->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileSize->externalTableName = $this->externalTableName;
$this->fileSize->aliasFieldName = $this->fileSize->tableName . "_" . $this->fileSize->fieldName;
$this->fileSize->label = "File Size";
$this->addType($this->fileSize);

$this->orginalFilename = new \Nemundo\Model\Type\Text\TextType();
$this->orginalFilename->fieldName = "orginal_filename";
$this->orginalFilename->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->orginalFilename->externalTableName = $this->externalTableName;
$this->orginalFilename->aliasFieldName = $this->orginalFilename->tableName . "_" . $this->orginalFilename->fieldName;
$this->orginalFilename->label = "Orginal Filename";
$this->addType($this->orginalFilename);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

}
}