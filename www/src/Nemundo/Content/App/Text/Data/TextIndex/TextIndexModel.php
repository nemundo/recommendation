<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $parentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parent;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadModel() {
$this->tableName = "text_text_index";
$this->aliasTableName = "text_text_index";
$this->label = "Text Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "text_text_index";
$this->id->externalTableName = "text_text_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "text_text_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->parentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->parentId->tableName = "text_text_index";
$this->parentId->fieldName = "parent";
$this->parentId->aliasFieldName = "text_text_index_parent";
$this->parentId->label = "Parent";
$this->parentId->allowNullValue = true;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "text_text_index";
$this->text->externalTableName = "text_text_index";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "text_text_index_text";
$this->text->label = "Text";
$this->text->allowNullValue = true;
$this->text->length = 255;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "text_text_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "text_text_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "parent";
$index->addType($this->parentId);

}
public function loadParent() {
if ($this->parent == null) {
$this->parent = new \Nemundo\Content\Data\Content\ContentExternalType($this, "text_text_index_parent");
$this->parent->tableName = "text_text_index";
$this->parent->fieldName = "parent";
$this->parent->aliasFieldName = "text_text_index_parent";
$this->parent->label = "Parent";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "text_text_index_content");
$this->content->tableName = "text_text_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "text_text_index_content";
$this->content->label = "Content";
}
return $this;
}
}