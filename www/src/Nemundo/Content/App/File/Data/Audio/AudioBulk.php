<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AudioModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->length, $this->length);
$this->typeValueList->setModelValue($this->model->orginalFilename, $this->orginalFilename);
$id = parent::save();
return $id;
}
}