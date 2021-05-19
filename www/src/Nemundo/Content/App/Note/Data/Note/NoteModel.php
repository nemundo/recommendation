<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NoteModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "note_note";
$this->aliasTableName = "note_note";
$this->label = "Note";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "note_note";
$this->id->externalTableName = "note_note";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "note_note_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "note_note";
$this->title->externalTableName = "note_note";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "note_note_title";
$this->title->label = "Title";
$this->title->allowNullValue = true;
$this->title->length = 255;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "note_note";
$this->text->externalTableName = "note_note";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "note_note_text";
$this->text->label = "Text";
$this->text->allowNullValue = true;

}
}