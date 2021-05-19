<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var DomainModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DomainModel();
}
/**
* @return DomainRow[]
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
* @return DomainRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return DomainRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new DomainRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}