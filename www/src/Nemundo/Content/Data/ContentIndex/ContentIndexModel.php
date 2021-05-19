<?php
namespace Nemundo\Content\Data\ContentIndex;
class ContentIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

protected function loadModel() {
$this->tableName = "content_content_index";
$this->aliasTableName = "content_content_index";
$this->label = "Content Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_content_index";
$this->id->externalTableName = "content_content_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_content_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "content_content_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "content_content_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "content_content_index";
$this->subject->externalTableName = "content_content_index";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "content_content_index_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = true;
$this->subject->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "content_content_index_content");
$this->content->tableName = "content_content_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "content_content_index_content";
$this->content->label = "Content";
}
return $this;
}
}