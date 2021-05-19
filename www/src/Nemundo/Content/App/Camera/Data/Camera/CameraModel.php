<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $imageAutoSize300;

/**
* @var \Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat
*/
public $imageFixWidth100;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize1200;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $camera;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $width;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $height;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $filesize;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $date;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $year;

protected function loadModel() {
$this->tableName = "camera_camera";
$this->aliasTableName = "camera_camera";
$this->label = "Camera";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "camera_camera";
$this->id->externalTableName = "camera_camera";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "camera_camera_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "camera_camera";
$this->image->externalTableName = "camera_camera";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "camera_camera_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;
$this->imageAutoSize300 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize300->size = 300;
$this->imageFixWidth100 = new \Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat($this->image);
$this->imageFixWidth100->width = 100;
$this->imageAutoSize1200 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize1200->size = 1200;

$this->camera = new \Nemundo\Model\Type\Text\TextType($this);
$this->camera->tableName = "camera_camera";
$this->camera->externalTableName = "camera_camera";
$this->camera->fieldName = "camera";
$this->camera->aliasFieldName = "camera_camera_camera";
$this->camera->label = "Camera";
$this->camera->allowNullValue = true;
$this->camera->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "camera_camera";
$this->dateTime->externalTableName = "camera_camera";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "camera_camera_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

$this->width = new \Nemundo\Model\Type\Number\NumberType($this);
$this->width->tableName = "camera_camera";
$this->width->externalTableName = "camera_camera";
$this->width->fieldName = "width";
$this->width->aliasFieldName = "camera_camera_width";
$this->width->label = "Width";
$this->width->allowNullValue = false;

$this->height = new \Nemundo\Model\Type\Number\NumberType($this);
$this->height->tableName = "camera_camera";
$this->height->externalTableName = "camera_camera";
$this->height->fieldName = "height";
$this->height->aliasFieldName = "camera_camera_height";
$this->height->label = "Height";
$this->height->allowNullValue = false;

$this->filesize = new \Nemundo\Model\Type\Number\NumberType($this);
$this->filesize->tableName = "camera_camera";
$this->filesize->externalTableName = "camera_camera";
$this->filesize->fieldName = "filesize";
$this->filesize->aliasFieldName = "camera_camera_filesize";
$this->filesize->label = "Filesize";
$this->filesize->allowNullValue = false;

$this->date = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->date->tableName = "camera_camera";
$this->date->externalTableName = "camera_camera";
$this->date->fieldName = "date";
$this->date->aliasFieldName = "camera_camera_date";
$this->date->label = "Date";
$this->date->allowNullValue = true;

$this->year = new \Nemundo\Model\Type\Number\NumberType($this);
$this->year->tableName = "camera_camera";
$this->year->externalTableName = "camera_camera";
$this->year->fieldName = "year";
$this->year->aliasFieldName = "camera_camera_year";
$this->year->label = "Year";
$this->year->allowNullValue = true;

}
}