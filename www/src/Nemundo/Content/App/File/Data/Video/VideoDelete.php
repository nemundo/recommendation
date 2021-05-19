<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var VideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VideoModel();
}
}