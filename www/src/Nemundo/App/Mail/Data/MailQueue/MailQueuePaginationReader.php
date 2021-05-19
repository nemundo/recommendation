<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueuePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MailQueueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailQueueModel();
}
/**
* @return MailQueueRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MailQueueRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}