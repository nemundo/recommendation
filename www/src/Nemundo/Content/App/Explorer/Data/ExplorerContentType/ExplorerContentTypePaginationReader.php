<?php
namespace Nemundo\Content\App\Explorer\Data\ExplorerContentType;
class ExplorerContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ExplorerContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ExplorerContentTypeModel();
}
/**
* @return ExplorerContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ExplorerContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}