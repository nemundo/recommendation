<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SystemLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
/**
* @return SystemLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SystemLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}