<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LocationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LocationModel();
}
/**
* @return LocationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LocationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}