<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
class VersionLargeTextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var VersionLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionLargeTextModel();
}
/**
* @return VersionLargeTextRow[]
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
* @return VersionLargeTextRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return VersionLargeTextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new VersionLargeTextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}