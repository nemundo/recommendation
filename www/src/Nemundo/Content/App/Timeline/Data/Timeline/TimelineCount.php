<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
class TimelineCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelineModel();
}
}