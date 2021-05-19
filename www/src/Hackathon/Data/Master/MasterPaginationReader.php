<?php
namespace Hackathon\Data\Master;
class MasterPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MasterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
/**
* @return MasterRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MasterRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}