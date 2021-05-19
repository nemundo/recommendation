<?php
namespace Hackathon\Data\Snb;
class SnbPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SnbModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SnbModel();
}
/**
* @return SnbRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SnbRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}