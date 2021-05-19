<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UnitModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
/**
* @return UnitRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UnitRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}