<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
class TimelapseJobCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimelapseJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseJobModel();
}
}