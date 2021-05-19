<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LinePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LineModel();
}
/**
* @return LineRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LineRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}