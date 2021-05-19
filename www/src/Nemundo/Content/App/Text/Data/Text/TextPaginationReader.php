<?php
namespace Nemundo\Content\App\Text\Data\Text;
class TextPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
/**
* @return TextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}