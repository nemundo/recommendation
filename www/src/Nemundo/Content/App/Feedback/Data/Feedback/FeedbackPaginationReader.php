<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new FeedbackRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}