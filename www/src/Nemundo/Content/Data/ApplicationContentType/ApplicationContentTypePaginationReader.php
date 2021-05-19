<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ApplicationContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationContentTypeModel();
}
/**
* @return ApplicationContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ApplicationContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}