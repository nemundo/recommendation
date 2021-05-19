<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FileTransferModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
/**
* @return FileTransferRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new FileTransferRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}