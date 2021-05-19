<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MailServerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailServerModel();
}
}