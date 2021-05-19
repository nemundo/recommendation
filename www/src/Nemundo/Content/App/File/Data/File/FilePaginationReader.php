<?php
namespace Nemundo\Content\App\File\Data\File;
class FilePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
/**
* @return FileRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new FileRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}