<?php
namespace Nemundo\Content\App\File\Data\Image;
class Image extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ImageModel
*/
protected $model;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

/**
* @var string
*/
public $fileExtension;

/**
* @var int
*/
public $imageWidth;

/**
* @var int
*/
public $imageHeight;

/**
* @var int
*/
public $fileSize;

/**
* @var string
*/
public $orginalFilename;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$this->typeValueList->setModelValue($this->model->fileExtension, $this->fileExtension);
$this->typeValueList->setModelValue($this->model->imageWidth, $this->imageWidth);
$this->typeValueList->setModelValue($this->model->imageHeight, $this->imageHeight);
$this->typeValueList->setModelValue($this->model->fileSize, $this->fileSize);
$this->typeValueList->setModelValue($this->model->orginalFilename, $this->orginalFilename);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
$id = parent::save();
return $id;
}
}