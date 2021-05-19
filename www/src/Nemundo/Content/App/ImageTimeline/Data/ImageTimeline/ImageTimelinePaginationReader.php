<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelinePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ImageTimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageTimelineModel();
}
/**
* @return ImageTimelineRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ImageTimelineRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}