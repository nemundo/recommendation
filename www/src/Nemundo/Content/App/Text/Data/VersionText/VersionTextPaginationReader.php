<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var VersionTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionTextModel();
}
/**
* @return VersionTextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new VersionTextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}