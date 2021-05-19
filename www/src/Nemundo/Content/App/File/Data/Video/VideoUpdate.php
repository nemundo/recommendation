<?php
namespace Nemundo\Content\App\File\Data\Video;
use Nemundo\Model\Data\AbstractModelUpdate;
class VideoUpdate extends AbstractModelUpdate {
/**
* @var VideoModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $video;

/**
* @var string
*/
public $orginalFilename;

public function __construct() {
parent::__construct();
$this->model = new VideoModel();
$this->video = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->video, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->orginalFilename, $this->orginalFilename);
parent::update();
}
}