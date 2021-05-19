<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhoneReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PhoneModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
/**
* @return PhoneRow[]
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
* @return PhoneRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PhoneRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PhoneRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}