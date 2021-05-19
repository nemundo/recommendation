<?php
namespace Nemundo\App\Mail\Data\MailServer;
class MailServerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "mail_mail_server";
$this->aliasTableName = "mail_mail_server";
$this->label = "Mail Server";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "mail_mail_server";
$this->id->externalTableName = "mail_mail_server";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "mail_mail_server_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->host = new \Nemundo\Model\Type\Text\TextType($this);
$this->host->tableName = "mail_mail_server";
$this->host->externalTableName = "mail_mail_server";
$this->host->fieldName = "host";
$this->host->aliasFieldName = "mail_mail_server_host";
$this->host->label = "Host";
$this->host->allowNullValue = false;
$this->host->length = 255;

$this->port = new \Nemundo\Model\Type\Number\NumberType($this);
$this->port->tableName = "mail_mail_server";
$this->port->externalTableName = "mail_mail_server";
$this->port->fieldName = "port";
$this->port->aliasFieldName = "mail_mail_server_port";
$this->port->label = "Port";
$this->port->allowNullValue = false;

$this->authentication = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->authentication->tableName = "mail_mail_server";
$this->authentication->externalTableName = "mail_mail_server";
$this->authentication->fieldName = "authentication";
$this->authentication->aliasFieldName = "mail_mail_server_authentication";
$this->authentication->label = "Authentication";
$this->authentication->allowNullValue = false;

$this->user = new \Nemundo\Model\Type\Text\TextType($this);
$this->user->tableName = "mail_mail_server";
$this->user->externalTableName = "mail_mail_server";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "mail_mail_server_user";
$this->user->label = "User";
$this->user->allowNullValue = false;
$this->user->length = 255;

$this->password = new \Nemundo\Model\Type\Text\TextType($this);
$this->password->tableName = "mail_mail_server";
$this->password->externalTableName = "mail_mail_server";
$this->password->fieldName = "password";
$this->password->aliasFieldName = "mail_mail_server_password";
$this->password->label = "Password";
$this->password->allowNullValue = false;
$this->password->length = 255;

$this->mailAddress = new \Nemundo\Model\Type\Text\TextType($this);
$this->mailAddress->tableName = "mail_mail_server";
$this->mailAddress->externalTableName = "mail_mail_server";
$this->mailAddress->fieldName = "mail_address";
$this->mailAddress->aliasFieldName = "mail_mail_server_mail_address";
$this->mailAddress->label = "Mail Address";
$this->mailAddress->allowNullValue = false;
$this->mailAddress->length = 255;

$this->mailText = new \Nemundo\Model\Type\Text\TextType($this);
$this->mailText->tableName = "mail_mail_server";
$this->mailText->externalTableName = "mail_mail_server";
$this->mailText->fieldName = "mail_text";
$this->mailText->aliasFieldName = "mail_mail_server_mail_text";
$this->mailText->label = "Mail Text";
$this->mailText->allowNullValue = false;
$this->mailText->length = 255;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "mail_mail_server";
$this->active->externalTableName = "mail_mail_server";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "mail_mail_server_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

}
}