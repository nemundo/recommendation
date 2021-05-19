<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimelapseVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseVideoModel();
}
}