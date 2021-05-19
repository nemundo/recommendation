<?php
namespace Nemundo\Content\Data\ContentType;
class ContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeModel();
}
/**
* @return \Nemundo\Content\Row\ContentTypeCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\Content\Row\ContentTypeCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}