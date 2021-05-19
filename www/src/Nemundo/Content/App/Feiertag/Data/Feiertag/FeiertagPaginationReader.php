<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FeiertagModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeiertagModel();
}
/**
* @return FeiertagRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new FeiertagRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}