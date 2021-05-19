<?php
namespace Nemundo\App\SystemLog\Data\Log;
class LogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
/**
* @return LogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}