<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
class TimelinePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelineModel();
}
/**
* @return TimelineRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TimelineRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}