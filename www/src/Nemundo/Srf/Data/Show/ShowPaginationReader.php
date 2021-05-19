<?php
namespace Nemundo\Srf\Data\Show;
class ShowPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ShowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowModel();
}
/**
* @return ShowRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ShowRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}