<?php
namespace Nemundo\App\Mail\Data\MailQueue;
use Nemundo\Model\Id\AbstractModelIdValue;
class MailQueueId extends AbstractModelIdValue {
/**
* @var MailQueueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailQueueModel();
}
}