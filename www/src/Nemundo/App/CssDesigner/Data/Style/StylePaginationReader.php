<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StylePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var StyleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleModel();
}
/**
* @return StyleRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StyleRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}