<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
/**
* @return LogTypeRow[]
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
* @return LogTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LogTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LogTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}