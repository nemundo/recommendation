<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentTypeCollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionModel();
}
/**
* @return ContentTypeCollectionRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentTypeCollectionRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}