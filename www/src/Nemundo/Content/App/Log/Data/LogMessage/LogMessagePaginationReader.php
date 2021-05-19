<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessagePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LogMessageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogMessageModel();
}
/**
* @return LogMessageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LogMessageRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}