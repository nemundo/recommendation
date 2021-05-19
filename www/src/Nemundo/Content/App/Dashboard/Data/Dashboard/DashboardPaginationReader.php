<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
class DashboardPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DashboardModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardModel();
}
/**
* @return DashboardRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DashboardRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}