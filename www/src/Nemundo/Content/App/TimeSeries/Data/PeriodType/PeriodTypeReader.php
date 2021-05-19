<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodTypeModel();
}
/**
* @return PeriodTypeRow[]
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
* @return PeriodTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PeriodTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PeriodTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}