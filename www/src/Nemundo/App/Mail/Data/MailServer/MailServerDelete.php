<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MailServerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailServerModel();
}
}