<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
class TimelapseJobValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TimelapseJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseJobModel();
}
}