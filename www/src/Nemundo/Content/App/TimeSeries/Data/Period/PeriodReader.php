<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PeriodModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodModel();
}
/**
* @return \Nemundo\Content\App\TimeSeries\Row\PeriodCustomRow[]
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
* @return \Nemundo\Content\App\TimeSeries\Row\PeriodCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\Content\App\TimeSeries\Row\PeriodCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\Content\App\TimeSeries\Row\PeriodCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}