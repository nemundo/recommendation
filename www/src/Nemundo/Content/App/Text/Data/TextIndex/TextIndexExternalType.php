<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TextIndexModel::class;
$this->externalTableName = "text_text_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->parentId = new \Nemundo\Model\Type\Id\IdType();
$this->parentId->fieldName = "parent";
$this->parentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parentId->aliasFieldName = $this->parentId->tableName ."_".$this->parentId->fieldName;
$this->parentId->label = "Parent";
$this->addType($this->parentId);

$this->text = new \Nemundo\Model\Type\Text\TextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

}
public function loadParent() {
if ($this->parent == null) {
$this->parent = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_parent");
$this->parent->fieldName = "parent";
$this->parent->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parent->aliasFieldName = $this->parent->tableName ."_".$this->parent->fieldName;
$this->parent->label = "Parent";
$this->addType($this->parent);
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
}