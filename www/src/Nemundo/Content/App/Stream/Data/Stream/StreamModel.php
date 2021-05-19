<?php
namespace Nemundo\Content\App\Stream\Data\Stream;
class StreamModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasMessage;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentViewId;

/**
* @var \Nemundo\Content\Data\ContentView\ContentViewExternalType
*/
public $contentView;

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

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadModel() {
$this->tableName = "stream_stream";
$this->aliasTableName = "stream_stream";
$this->label = "Stream";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "stream_stream";
$this->id->externalTableName = "stream_stream";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "stream_stream_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "stream_stream";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "stream_stream_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->hasMessage = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasMessage->tableName = "stream_stream";
$this->hasMessage->externalTableName = "stream_stream";
$this->hasMessage->fieldName = "has_message";
$this->hasMessage->aliasFieldName = "stream_stream_has_message";
$this->hasMessage->label = "Has Message";
$this->hasMessage->allowNullValue = false;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "stream_stream";
$this->message->externalTableName = "stream_stream";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "stream_stream_message";
$this->message->label = "Message";
$this->message->allowNullValue = true;

$this->contentViewId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentViewId->tableName = "stream_stream";
$this->contentViewId->fieldName = "content_view";
$this->contentViewId->aliasFieldName = "stream_stream_content_view";
$this->contentViewId->label = "Content View";
$this->contentViewId->allowNullValue = true;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "stream_stream";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "stream_stream_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "stream_stream";
$this->dateTime->externalTableName = "stream_stream";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "stream_stream_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "stream_stream";
$this->active->externalTableName = "stream_stream";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "stream_stream_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "stream_stream_content");
$this->content->tableName = "stream_stream";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "stream_stream_content";
$this->content->label = "Content";
}
return $this;
}
public function loadContentView() {
if ($this->contentView == null) {
$this->contentView = new \Nemundo\Content\Data\ContentView\ContentViewExternalType($this, "stream_stream_content_view");
$this->contentView->tableName = "stream_stream";
$this->contentView->fieldName = "content_view";
$this->contentView->aliasFieldName = "stream_stream_content_view";
$this->contentView->label = "Content View";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "stream_stream_user");
$this->user->tableName = "stream_stream";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "stream_stream_user";
$this->user->label = "User";
}
return $this;
}
}