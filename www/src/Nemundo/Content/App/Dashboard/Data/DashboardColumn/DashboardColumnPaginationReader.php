<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
class DashboardColumnPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DashboardColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardColumnModel();
}
/**
* @return DashboardColumnRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DashboardColumnRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}