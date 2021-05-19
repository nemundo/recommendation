<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NoteExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = NoteModel::class;
$this->externalTableName = "note_note";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->text = new \Nemundo\Model\Type\Text\LargeTextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

}
}