<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RestrictedContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RestrictedContentTypeModel();
}
/**
* @return RestrictedContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RestrictedContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}