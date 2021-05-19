<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RoutePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RouteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteModel();
}
/**
* @return RouteRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RouteRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}