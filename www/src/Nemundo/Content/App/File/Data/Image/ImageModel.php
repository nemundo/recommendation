<?php
namespace Nemundo\Content\App\File\Data\Image;
class ImageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize400;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize1200;

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

protected function loadModel() {
$this->tableName = "file_image";
$this->aliasTableName = "file_image";
$this->label = "Image";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_image";
$this->id->externalTableName = "file_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "file_image";
$this->image->externalTableName = "file_image";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "file_image_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;
$this->imageAutoSize400 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize400->size = 400;
$this->imageAutoSize1200 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize1200->size = 1200;

$this->fileExtension = new \Nemundo\Model\Type\Text\TextType($this);
$this->fileExtension->tableName = "file_image";
$this->fileExtension->externalTableName = "file_image";
$this->fileExtension->fieldName = "file_extension";
$this->fileExtension->aliasFieldName = "file_image_file_extension";
$this->fileExtension->label = "File Extension";
$this->fileExtension->allowNullValue = true;
$this->fileExtension->length = 5;

$this->imageWidth = new \Nemundo\Model\Type\Number\NumberType($this);
$this->imageWidth->tableName = "file_image";
$this->imageWidth->externalTableName = "file_image";
$this->imageWidth->fieldName = "image_width";
$this->imageWidth->aliasFieldName = "file_image_image_width";
$this->imageWidth->label = "Image Width";
$this->imageWidth->allowNullValue = true;

$this->imageHeight = new \Nemundo\Model\Type\Number\NumberType($this);
$this->imageHeight->tableName = "file_image";
$this->imageHeight->externalTableName = "file_image";
$this->imageHeight->fieldName = "image_height";
$this->imageHeight->aliasFieldName = "file_image_image_height";
$this->imageHeight->label = "Image Height";
$this->imageHeight->allowNullValue = true;

$this->fileSize = new \Nemundo\Model\Type\Number\NumberType($this);
$this->fileSize->tableName = "file_image";
$this->fileSize->externalTableName = "file_image";
$this->fileSize->fieldName = "file_size";
$this->fileSize->aliasFieldName = "file_image_file_size";
$this->fileSize->label = "File Size";
$this->fileSize->allowNullValue = true;

$this->orginalFilename = new \Nemundo\Model\Type\Text\TextType($this);
$this->orginalFilename->tableName = "file_image";
$this->orginalFilename->externalTableName = "file_image";
$this->orginalFilename->fieldName = "orginal_filename";
$this->orginalFilename->aliasFieldName = "file_image_orginal_filename";
$this->orginalFilename->label = "Orginal Filename";
$this->orginalFilename->allowNullValue = true;
$this->orginalFilename->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "file_image";
$this->dateTime->externalTableName = "file_image";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "file_image_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

}
}