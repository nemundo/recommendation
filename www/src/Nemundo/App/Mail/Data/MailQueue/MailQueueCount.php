<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueueCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MailQueueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailQueueModel();
}
}