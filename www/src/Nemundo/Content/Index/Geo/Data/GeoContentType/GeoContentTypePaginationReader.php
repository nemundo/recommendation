<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
class GeoContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var GeoContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoContentTypeModel();
}
/**
* @return GeoContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new GeoContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}