<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var IndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
/**
* @return IndexTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new IndexTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}