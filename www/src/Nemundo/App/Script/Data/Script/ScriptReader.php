<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ScriptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ScriptModel();
}
/**
* @return \Nemundo\App\Script\Row\ScriptCustomRow[]
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
* @return \Nemundo\App\Script\Row\ScriptCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\App\Script\Row\ScriptCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\App\Script\Row\ScriptCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}