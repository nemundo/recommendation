<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueueReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MailQueueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailQueueModel();
}
/**
* @return MailQueueRow[]
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
* @return MailQueueRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MailQueueRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MailQueueRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}