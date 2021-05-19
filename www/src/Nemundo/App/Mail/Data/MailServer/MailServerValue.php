<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MailServerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailServerModel();
}
}