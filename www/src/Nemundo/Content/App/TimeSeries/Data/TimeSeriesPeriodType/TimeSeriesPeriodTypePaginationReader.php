<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TimeSeriesPeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesPeriodTypeModel();
}
/**
* @return TimeSeriesPeriodTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TimeSeriesPeriodTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}