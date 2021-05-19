<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ShowWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowWidgetModel();
}
/**
* @return ShowWidgetRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ShowWidgetRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}