<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SwissMapContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
}
/**
* @return SwissMapContentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SwissMapContentRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}