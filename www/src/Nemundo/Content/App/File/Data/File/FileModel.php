<?php
namespace Nemundo\Content\App\File\Data\File;
class FileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\RedirectFilenameType
*/
public $file;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "file_file";
$this->aliasTableName = "file_file";
$this->label = "File";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_file";
$this->id->externalTableName = "file_file";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_file_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->file = new \Nemundo\Model\Type\File\RedirectFilenameType($this);
$this->file->tableName = "file_file";
$this->file->externalTableName = "file_file";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "file_file_file";
$this->file->label = "File";
$this->file->allowNullValue = true;
$this->file->redirectSite = \Nemundo\Content\App\File\Data\File\Redirect\FileRedirectConfig::$redirectFileFileSite;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "file_file";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "file_file_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "file_file";
$this->dateTime->externalTableName = "file_file";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "file_file_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "file_file_user");
$this->user->tableName = "file_file";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "file_file_user";
$this->user->label = "User";
}
return $this;
}
}