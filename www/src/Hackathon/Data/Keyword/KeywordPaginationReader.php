<?php
namespace Hackathon\Data\Keyword;
class KeywordPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var KeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
/**
* @return KeywordRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new KeywordRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}