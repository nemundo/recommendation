<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimelapseJobId extends AbstractModelIdValue {
/**
* @var TimelapseJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseJobModel();
}
}