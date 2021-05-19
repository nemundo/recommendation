<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var EnclosureModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
/**
* @return EnclosureRow[]
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
* @return EnclosureRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return EnclosureRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new EnclosureRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}