<?php
namespace Nemundo\Content\Data\Content;
class ContentPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentModel();
}
/**
* @return \Nemundo\Content\Row\ContentCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\Content\Row\ContentCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}