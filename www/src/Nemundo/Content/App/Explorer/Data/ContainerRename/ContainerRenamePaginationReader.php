<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenamePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContainerRenameModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerRenameModel();
}
/**
* @return ContainerRenameRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContainerRenameRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}