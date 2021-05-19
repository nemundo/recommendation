<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
/**
* @return LogTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LogTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}