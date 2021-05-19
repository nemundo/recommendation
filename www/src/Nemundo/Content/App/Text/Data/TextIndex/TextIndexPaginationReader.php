<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TextIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextIndexModel();
}
/**
* @return TextIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TextIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}