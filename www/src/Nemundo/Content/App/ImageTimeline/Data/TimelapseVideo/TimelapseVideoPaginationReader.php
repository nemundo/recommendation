<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TimelapseVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseVideoModel();
}
/**
* @return TimelapseVideoRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TimelapseVideoRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}