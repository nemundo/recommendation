<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
class SubscriptionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "subscription_subscription";
$this->aliasTableName = "subscription_subscription";
$this->label = "Subscription";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "subscription_subscription";
$this->id->externalTableName = "subscription_subscription";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "subscription_subscription_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "subscription_subscription";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "subscription_subscription_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "subscription_subscription";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "subscription_subscription_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "subscription_subscription_user");
$this->user->tableName = "subscription_subscription";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "subscription_subscription_user";
$this->user->label = "User";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "subscription_subscription_content");
$this->content->tableName = "subscription_subscription";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "subscription_subscription_content";
$this->content->label = "Content";
}
return $this;
}
}