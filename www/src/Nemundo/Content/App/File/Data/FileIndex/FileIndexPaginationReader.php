<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FileIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileIndexModel();
}
/**
* @return FileIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new FileIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}