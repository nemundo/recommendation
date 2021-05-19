<?php
namespace Hackathon\Data\NewsType;
class NewsTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var NewsTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
/**
* @return NewsTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new NewsTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}