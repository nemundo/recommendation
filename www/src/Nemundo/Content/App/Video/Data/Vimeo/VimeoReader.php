<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var VimeoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
/**
* @return VimeoRow[]
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
* @return VimeoRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return VimeoRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new VimeoRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}