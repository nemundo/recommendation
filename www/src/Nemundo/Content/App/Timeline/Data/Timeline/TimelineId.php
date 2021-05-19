<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimelineId extends AbstractModelIdValue {
/**
* @var TimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelineModel();
}
}