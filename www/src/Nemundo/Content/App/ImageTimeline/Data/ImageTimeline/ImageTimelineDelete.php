<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ImageTimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageTimelineModel();
}
}