<?php
namespace Nemundo\App\Mail\Data\MailServer;
use Nemundo\Model\Data\AbstractModelUpdate;
class MailServerUpdate extends AbstractModelUpdate {
/**
* @var MailServerModel
*/
public $model;

/**
* @var string
*/
public $host;

/**
* @var int
*/
public $port;

/**
* @var bool
*/
public $authentication;

/**
* @var string
*/
public $user;

/**
* @var string
*/
public $password;

/**
* @var string
*/
public $mailAddress;

/**
* @var string
*/
public $mailText;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new MailServerModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->host, $this->host);
$this->typeValueList->setModelValue($this->model->port, $this->port);
$this->typeValueList->setModelValue($this->model->authentication, $this->authentication);
$this->typeValueList->setModelValue($this->model->user, $this->user);
$this->typeValueList->setModelValue($this->model->password, $this->password);
$this->typeValueList->setModelValue($this->model->mailAddress, $this->mailAddress);
$this->typeValueList->setModelValue($this->model->mailText, $this->mailText);
$this->typeValueList->setModelValue($this->model->active, $this->active);
parent::update();
}
}