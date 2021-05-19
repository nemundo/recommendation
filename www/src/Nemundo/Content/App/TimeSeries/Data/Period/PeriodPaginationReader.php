<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new \Nemundo\Content\App\TimeSeries\Row\PeriodCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}