<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TvLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
/**
* @return TvLivestreamRow[]
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
* @return TvLivestreamRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TvLivestreamRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TvLivestreamRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}