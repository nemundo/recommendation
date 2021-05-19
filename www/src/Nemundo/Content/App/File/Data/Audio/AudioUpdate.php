<?php
namespace Nemundo\Content\App\File\Data\Audio;
use Nemundo\Model\Data\AbstractModelUpdate;
class AudioUpdate extends AbstractModelUpdate {
/**
* @var AudioModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $audio;

/**
* @var int
*/
public $length;

/**
* @var string
*/
public $orginalFilename;

public function __construct() {
parent::__construct();
$this->model = new AudioModel();
$this->audio = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->audio, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->length, $this->length);
$this->typeValueList->setModelValue($this->model->orginalFilename, $this->orginalFilename);
parent::update();
}
}