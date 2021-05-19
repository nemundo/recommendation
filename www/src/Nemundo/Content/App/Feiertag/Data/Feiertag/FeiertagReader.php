<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FeiertagModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeiertagModel();
}
/**
* @return FeiertagRow[]
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
* @return FeiertagRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FeiertagRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FeiertagRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}