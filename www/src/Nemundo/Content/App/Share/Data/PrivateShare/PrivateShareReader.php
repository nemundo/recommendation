<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
class PrivateShareReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PrivateShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
/**
* @return PrivateShareRow[]
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
* @return PrivateShareRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PrivateShareRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PrivateShareRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}