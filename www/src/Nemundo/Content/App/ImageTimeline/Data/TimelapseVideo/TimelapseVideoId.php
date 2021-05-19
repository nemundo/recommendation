<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimelapseVideoId extends AbstractModelIdValue {
/**
* @var TimelapseVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseVideoModel();
}
}