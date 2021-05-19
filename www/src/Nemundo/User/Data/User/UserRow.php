<?php
namespace Nemundo\User\Data\User;
class UserRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UserModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var bool
*/
public $active;

/**
* @var string
*/
public $login;

/**
* @var string
*/
public $password;

/**
* @var string
*/
public $email;

/**
* @var string
*/
public $displayName;

/**
* @var string
*/
public $secureToken;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->active = boolval($this->getModelValue($model->active));
$this->login = $this->getModelValue($model->login);
$this->password = $this->getModelValue($model->password);
$this->email = $this->getModelValue($model->email);
$this->displayName = $this->getModelValue($model->displayName);
$this->secureToken = $this->getModelValue($model->secureToken);
}
}