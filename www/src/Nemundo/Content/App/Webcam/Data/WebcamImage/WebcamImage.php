<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImage extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WebcamImageModel
*/
protected $model;

/**
* @var string
*/
public $webcamId;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

/**
* @var string
*/
public $hash;

public function __construct() {
parent::__construct();
$this->model = new WebcamImageModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function save() {
$this->typeValueList->setModelValue($this->model->webcamId, $this->webcamId);
$this->typeValueList->setModelValue($this->model->hash, $this->hash);
$id = parent::save();
return $id;
}
}