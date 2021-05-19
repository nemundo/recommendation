<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContainerRenameModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerRenameModel();
}
/**
* @return ContainerRenameRow[]
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
* @return ContainerRenameRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContainerRenameRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContainerRenameRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}