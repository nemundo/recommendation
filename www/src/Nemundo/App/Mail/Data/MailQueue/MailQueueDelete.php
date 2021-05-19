<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueueDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MailQueueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailQueueModel();
}
}