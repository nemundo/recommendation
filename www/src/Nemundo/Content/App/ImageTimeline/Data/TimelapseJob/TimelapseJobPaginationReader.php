<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
class TimelapseJobPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TimelapseJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseJobModel();
}
/**
* @return TimelapseJobRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TimelapseJobRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}