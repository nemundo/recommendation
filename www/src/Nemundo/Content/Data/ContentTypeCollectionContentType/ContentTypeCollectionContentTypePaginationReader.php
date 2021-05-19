<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentTypeCollectionContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionContentTypeModel();
}
/**
* @return ContentTypeCollectionContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentTypeCollectionContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}