<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LayoutColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
/**
* @return LayoutColumnRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LayoutColumnRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}