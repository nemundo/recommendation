<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MailServerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailServerModel();
}
/**
* @return MailServerRow[]
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
* @return MailServerRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MailServerRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MailServerRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}