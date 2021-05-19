<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLinePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WidgetLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
/**
* @return WidgetLineRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WidgetLineRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}