<?php
namespace Nemundo\Content\App\File\Data\Video;
use Nemundo\Model\Id\AbstractModelIdValue;
class VideoId extends AbstractModelIdValue {
/**
* @var VideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VideoModel();
}
}