<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class ListingReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ListingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
/**
* @return ListingRow[]
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
* @return ListingRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ListingRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ListingRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}