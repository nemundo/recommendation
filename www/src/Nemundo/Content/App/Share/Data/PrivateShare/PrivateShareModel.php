<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
class PrivateShareModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

protected function loadModel() {
$this->tableName = "share_private_share";
$this->aliasTableName = "share_private_share";
$this->label = "Private Share";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "share_private_share";
$this->id->externalTableName = "share_private_share";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "share_private_share_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "share_private_share";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "share_private_share_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "share_private_share";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "share_private_share_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "share_private_share";
$this->message->externalTableName = "share_private_share";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "share_private_share_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "user_content";
$index->addType($this->userId);
$index->addType($this->contentId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "share_private_share_user");
$this->user->tableName = "share_private_share";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "share_private_share_user";
$this->user->label = "User";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "share_private_share_content");
$this->content->tableName = "share_private_share";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "share_private_share_content";
$this->content->label = "Content";
}
return $this;
}
}