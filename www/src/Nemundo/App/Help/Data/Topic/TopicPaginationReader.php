<?php
namespace Nemundo\App\Help\Data\Topic;
class TopicPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TopicModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
/**
* @return TopicRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TopicRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}