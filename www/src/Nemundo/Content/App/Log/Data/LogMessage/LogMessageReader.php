<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessageReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LogMessageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogMessageModel();
}
/**
* @return LogMessageRow[]
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
* @return LogMessageRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LogMessageRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LogMessageRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}