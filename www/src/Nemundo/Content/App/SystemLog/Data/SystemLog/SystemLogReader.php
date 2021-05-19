<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SystemLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
/**
* @return SystemLogRow[]
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
* @return SystemLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SystemLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SystemLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}