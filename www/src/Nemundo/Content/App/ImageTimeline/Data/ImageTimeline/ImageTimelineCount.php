<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ImageTimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageTimelineModel();
}
}