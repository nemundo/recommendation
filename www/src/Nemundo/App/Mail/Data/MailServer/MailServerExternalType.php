<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $host;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $port;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $authentication;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $password;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $mailAddress;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $mailText;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = MailServerModel::class;
$this->externalTableName = "mail_mail_server";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->host = new \Nemundo\Model\Type\Text\TextType();
$this->host->fieldName = "host";
$this->host->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->host->externalTableName = $this->externalTableName;
$this->host->aliasFieldName = $this->host->tableName . "_" . $this->host->fieldName;
$this->host->label = "Host";
$this->addType($this->host);

$this->port = new \Nemundo\Model\Type\Number\NumberType();
$this->port->fieldName = "port";
$this->port->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->port->externalTableName = $this->externalTableName;
$this->port->aliasFieldName = $this->port->tableName . "_" . $this->port->fieldName;
$this->port->label = "Port";
$this->addType($this->port);

$this->authentication = new \Nemundo\Model\Type\Number\YesNoType();
$this->authentication->fieldName = "authentication";
$this->authentication->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->authentication->externalTableName = $this->externalTableName;
$this->authentication->aliasFieldName = $this->authentication->tableName . "_" . $this->authentication->fieldName;
$this->authentication->label = "Authentication";
$this->addType($this->authentication);

$this->user = new \Nemundo\Model\Type\Text\TextType();
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->externalTableName = $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName . "_" . $this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);

$this->password = new \Nemundo\Model\Type\Text\TextType();
$this->password->fieldName = "password";
$this->password->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->password->externalTableName = $this->externalTableName;
$this->password->aliasFieldName = $this->password->tableName . "_" . $this->password->fieldName;
$this->password->label = "Password";
$this->addType($this->password);

$this->mailAddress = new \Nemundo\Model\Type\Text\TextType();
$this->mailAddress->fieldName = "mail_address";
$this->mailAddress->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailAddress->externalTableName = $this->externalTableName;
$this->mailAddress->aliasFieldName = $this->mailAddress->tableName . "_" . $this->mailAddress->fieldName;
$this->mailAddress->label = "Mail Address";
$this->addType($this->mailAddress);

$this->mailText = new \Nemundo\Model\Type\Text\TextType();
$this->mailText->fieldName = "mail_text";
$this->mailText->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailText->externalTableName = $this->externalTableName;
$this->mailText->aliasFieldName = $this->mailText->tableName . "_" . $this->mailText->fieldName;
$this->mailText->label = "Mail Text";
$this->addType($this->mailText);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

}
}