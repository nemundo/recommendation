<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LivestreamCmsModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
/**
* @return LivestreamCmsRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return LivestreamCmsRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LivestreamCmsRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LivestreamCmsRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}