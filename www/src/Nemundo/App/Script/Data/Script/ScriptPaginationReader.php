<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new \Nemundo\App\Script\Row\ScriptCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}