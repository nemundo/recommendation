<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MediaTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
/**
* @return MediaTypeRow[]
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
* @return MediaTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MediaTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MediaTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}