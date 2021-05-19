<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFilePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
}
/**
* @return WebFileRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WebFileRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}