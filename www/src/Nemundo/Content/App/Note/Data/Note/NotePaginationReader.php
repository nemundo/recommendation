<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NotePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new NoteRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}