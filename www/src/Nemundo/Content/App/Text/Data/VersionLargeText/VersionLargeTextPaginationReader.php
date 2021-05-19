<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
class VersionLargeTextPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var VersionLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionLargeTextModel();
}
/**
* @return VersionLargeTextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new VersionLargeTextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}