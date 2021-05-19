<?php
namespace Hackathon\Data\WordIndex;
class WordIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WordIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordIndexModel();
}
/**
* @return WordIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WordIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}