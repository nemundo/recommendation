<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimelapseVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseVideoModel();
}
}