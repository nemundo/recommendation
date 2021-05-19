<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebRadioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebRadioModel();
}
/**
* @return WebRadioRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WebRadioRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}