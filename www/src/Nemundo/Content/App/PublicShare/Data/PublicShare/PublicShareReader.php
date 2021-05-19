<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShareReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PublicShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
/**
* @return PublicShareRow[]
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
* @return PublicShareRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PublicShareRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PublicShareRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}