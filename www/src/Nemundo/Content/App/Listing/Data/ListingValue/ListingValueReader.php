<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValueReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ListingValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingValueModel();
}
/**
* @return ListingValueRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return ListingValueRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ListingValueRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ListingValueRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}