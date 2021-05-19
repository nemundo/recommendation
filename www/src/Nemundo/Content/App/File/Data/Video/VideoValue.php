<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var VideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VideoModel();
}
}