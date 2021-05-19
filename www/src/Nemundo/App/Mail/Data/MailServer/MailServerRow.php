<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MailServerModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->host = $this->getModelValue($model->host);
$this->port = intval($this->getModelValue($model->port));
$this->authentication = boolval($this->getModelValue($model->authentication));
$this->user = $this->getModelValue($model->user);
$this->password = $this->getModelValue($model->password);
$this->mailAddress = $this->getModelValue($model->mailAddress);
$this->mailText = $this->getModelValue($model->mailText);
$this->active = boolval($this->getModelValue($model->active));
}
}