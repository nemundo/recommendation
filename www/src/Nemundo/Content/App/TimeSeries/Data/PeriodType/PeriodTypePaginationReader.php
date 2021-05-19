<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new PeriodTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}