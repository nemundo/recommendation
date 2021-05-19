<?php
namespace Nemundo\App\Mail\Data\MailServer;
use Nemundo\Model\Id\AbstractModelIdValue;
class MailServerId extends AbstractModelIdValue {
/**
* @var MailServerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailServerModel();
}
}