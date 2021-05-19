<?php
namespace Nemundo\Content\Data\ContentIndex;
class ContentIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentIndexModel();
}
/**
* @return ContentIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}