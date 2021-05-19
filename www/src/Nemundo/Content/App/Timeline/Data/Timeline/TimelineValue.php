<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
class TimelineValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelineModel();
}
}