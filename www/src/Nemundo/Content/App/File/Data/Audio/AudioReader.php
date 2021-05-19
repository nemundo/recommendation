<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AudioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AudioModel();
}
/**
* @return AudioRow[]
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
* @return AudioRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AudioRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AudioRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}