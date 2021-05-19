<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ImageTimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageTimelineModel();
}
}