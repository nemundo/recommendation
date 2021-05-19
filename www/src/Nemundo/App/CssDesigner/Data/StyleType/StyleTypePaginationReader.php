<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var StyleTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
/**
* @return StyleTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StyleTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}