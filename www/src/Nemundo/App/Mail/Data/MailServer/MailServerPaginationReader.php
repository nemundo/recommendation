<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MailServerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailServerModel();
}
/**
* @return MailServerRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MailServerRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}