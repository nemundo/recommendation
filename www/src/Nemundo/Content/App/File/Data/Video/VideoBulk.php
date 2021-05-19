<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var VideoModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->orginalFilename, $this->orginalFilename);
$id = parent::save();
return $id;
}
}