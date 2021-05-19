<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueueValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MailQueueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailQueueModel();
}
}