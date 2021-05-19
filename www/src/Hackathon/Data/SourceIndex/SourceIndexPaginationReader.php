<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SourceIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceIndexModel();
}
/**
* @return SourceIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SourceIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}