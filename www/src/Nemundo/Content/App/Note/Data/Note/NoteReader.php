<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NoteReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var NoteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NoteModel();
}
/**
* @return NoteRow[]
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
* @return NoteRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return NoteRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new NoteRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}