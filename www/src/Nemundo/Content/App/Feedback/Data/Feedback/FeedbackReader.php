<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FeedbackModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeedbackModel();
}
/**
* @return FeedbackRow[]
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
* @return FeedbackRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FeedbackRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FeedbackRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}