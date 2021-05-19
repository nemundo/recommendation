<?php
namespace Nemundo\App\Help\Data\Code;
class CodePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CodeModel();
}
/**
* @return CodeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CodeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}