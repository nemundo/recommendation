<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
/**
* @return ContentActionRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentActionRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}