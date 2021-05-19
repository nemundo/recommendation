<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var GeoIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
}
/**
* @return GeoIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new GeoIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}