<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
use Nemundo\Model\Data\AbstractModelUpdate;
class CameraUpdate extends AbstractModelUpdate {
/**
* @var CameraModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

/**
* @var string
*/
public $camera;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $width;

/**
* @var int
*/
public $height;

/**
* @var int
*/
public $filesize;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var int
*/
public $year;

public function __construct() {
parent::__construct();
$this->model = new CameraModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
$this->date = new \Nemundo\Core\Type\DateTime\Date();
}
public function update() {
$this->typeValueList->setModelValue($this->model->camera, $this->camera);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
$this->typeValueList->setModelValue($this->model->width, $this->width);
$this->typeValueList->setModelValue($this->model->height, $this->height);
$this->typeValueList->setModelValue($this->model->filesize, $this->filesize);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->date, $this->typeValueList);
$property->setValue($this->date);
$this->typeValueList->setModelValue($this->model->year, $this->year);
parent::update();
}
}