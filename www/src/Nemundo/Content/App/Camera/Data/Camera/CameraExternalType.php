<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CameraModel::class;
$this->externalTableName = "camera_camera";
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

$this->camera = new \Nemundo\Model\Type\Text\TextType();
$this->camera->fieldName = "camera";
$this->camera->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->camera->externalTableName = $this->externalTableName;
$this->camera->aliasFieldName = $this->camera->tableName . "_" . $this->camera->fieldName;
$this->camera->label = "Camera";
$this->addType($this->camera);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->width = new \Nemundo\Model\Type\Number\NumberType();
$this->width->fieldName = "width";
$this->width->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->width->externalTableName = $this->externalTableName;
$this->width->aliasFieldName = $this->width->tableName . "_" . $this->width->fieldName;
$this->width->label = "Width";
$this->addType($this->width);

$this->height = new \Nemundo\Model\Type\Number\NumberType();
$this->height->fieldName = "height";
$this->height->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->height->externalTableName = $this->externalTableName;
$this->height->aliasFieldName = $this->height->tableName . "_" . $this->height->fieldName;
$this->height->label = "Height";
$this->addType($this->height);

$this->filesize = new \Nemundo\Model\Type\Number\NumberType();
$this->filesize->fieldName = "filesize";
$this->filesize->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->filesize->externalTableName = $this->externalTableName;
$this->filesize->aliasFieldName = $this->filesize->tableName . "_" . $this->filesize->fieldName;
$this->filesize->label = "Filesize";
$this->addType($this->filesize);

$this->date = new \Nemundo\Model\Type\DateTime\DateType();
$this->date->fieldName = "date";
$this->date->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->date->externalTableName = $this->externalTableName;
$this->date->aliasFieldName = $this->date->tableName . "_" . $this->date->fieldName;
$this->date->label = "Date";
$this->addType($this->date);

$this->year = new \Nemundo\Model\Type\Number\NumberType();
$this->year->fieldName = "year";
$this->year->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->year->externalTableName = $this->externalTableName;
$this->year->aliasFieldName = $this->year->tableName . "_" . $this->year->fieldName;
$this->year->label = "Year";
$this->addType($this->year);

}
}