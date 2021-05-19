<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
use Nemundo\Model\Id\AbstractModelIdValue;
class ImageTimelineId extends AbstractModelIdValue {
/**
* @var ImageTimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageTimelineModel();
}
}