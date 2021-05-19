<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PriorityModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
/**
* @return PriorityRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PriorityRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}