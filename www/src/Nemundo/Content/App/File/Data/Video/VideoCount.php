<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var VideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VideoModel();
}
}