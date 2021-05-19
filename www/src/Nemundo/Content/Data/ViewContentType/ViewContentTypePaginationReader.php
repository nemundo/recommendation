<?php
namespace Nemundo\Content\Data\ViewContentType;
class ViewContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ViewContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
/**
* @return ViewContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ViewContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}