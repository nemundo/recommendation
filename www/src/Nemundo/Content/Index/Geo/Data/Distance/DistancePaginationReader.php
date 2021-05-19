<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistancePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DistanceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DistanceModel();
}
/**
* @return DistanceRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DistanceRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}