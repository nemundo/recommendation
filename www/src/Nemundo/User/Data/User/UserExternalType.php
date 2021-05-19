<?php
namespace Nemundo\User\Data\User;
class UserExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $login;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $password;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $email;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $displayName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $secureToken;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UserModel::class;
$this->externalTableName = "user_user";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->login = new \Nemundo\Model\Type\Text\TextType();
$this->login->fieldName = "login";
$this->login->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->login->externalTableName = $this->externalTableName;
$this->login->aliasFieldName = $this->login->tableName . "_" . $this->login->fieldName;
$this->login->label = "Login";
$this->addType($this->login);

$this->password = new \Nemundo\Model\Type\Text\TextType();
$this->password->fieldName = "password";
$this->password->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->password->externalTableName = $this->externalTableName;
$this->password->aliasFieldName = $this->password->tableName . "_" . $this->password->fieldName;
$this->password->label = "Password";
$this->addType($this->password);

$this->email = new \Nemundo\Model\Type\Text\TextType();
$this->email->fieldName = "email";
$this->email->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->email->externalTableName = $this->externalTableName;
$this->email->aliasFieldName = $this->email->tableName . "_" . $this->email->fieldName;
$this->email->label = "eMail";
$this->addType($this->email);

$this->displayName = new \Nemundo\Model\Type\Text\TextType();
$this->displayName->fieldName = "display_name";
$this->displayName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->displayName->externalTableName = $this->externalTableName;
$this->displayName->aliasFieldName = $this->displayName->tableName . "_" . $this->displayName->fieldName;
$this->displayName->label = "Display Name";
$this->addType($this->displayName);

$this->secureToken = new \Nemundo\Model\Type\Text\TextType();
$this->secureToken->fieldName = "secure_token";
$this->secureToken->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->secureToken->externalTableName = $this->externalTableName;
$this->secureToken->aliasFieldName = $this->secureToken->tableName . "_" . $this->secureToken->fieldName;
$this->secureToken->label = "Secure Token";
$this->addType($this->secureToken);

}
}