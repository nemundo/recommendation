<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeriesPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TimeSeriesModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesModel();
}
/**
* @return TimeSeriesRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TimeSeriesRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}