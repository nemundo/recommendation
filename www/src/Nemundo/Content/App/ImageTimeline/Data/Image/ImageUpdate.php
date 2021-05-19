<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Image;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageUpdate extends AbstractModelUpdate {
/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $timelineId;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

/**
* @var string
*/
public $hash;

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
public function update() {
$this->typeValueList->setModelValue($this->model->timelineId, $this->timelineId);
$this->typeValueList->setModelValue($this->model->hash, $this->hash);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
parent::update();
}
}