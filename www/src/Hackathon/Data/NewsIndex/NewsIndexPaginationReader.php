<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var NewsIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsIndexModel();
}
/**
* @return NewsIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new NewsIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}