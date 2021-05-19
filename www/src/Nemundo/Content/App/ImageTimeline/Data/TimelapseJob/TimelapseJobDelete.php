<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
class TimelapseJobDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimelapseJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseJobModel();
}
}