<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
class TimelineDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelineModel();
}
}