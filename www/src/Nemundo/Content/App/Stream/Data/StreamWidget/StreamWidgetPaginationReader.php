<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidgetPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var StreamWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamWidgetModel();
}
/**
* @return StreamWidgetRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StreamWidgetRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}