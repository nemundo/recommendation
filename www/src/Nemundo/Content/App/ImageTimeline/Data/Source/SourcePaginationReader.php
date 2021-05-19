<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
class SourcePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SourceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
/**
* @return SourceRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SourceRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}