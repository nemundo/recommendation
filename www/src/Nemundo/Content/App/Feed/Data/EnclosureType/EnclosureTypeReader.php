<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var EnclosureTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
/**
* @return EnclosureTypeRow[]
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
* @return EnclosureTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return EnclosureTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new EnclosureTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}