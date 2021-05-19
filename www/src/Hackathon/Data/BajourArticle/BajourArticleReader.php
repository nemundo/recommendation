<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticleReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var BajourArticleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BajourArticleModel();
}
/**
* @return BajourArticleRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return BajourArticleRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return BajourArticleRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new BajourArticleRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}