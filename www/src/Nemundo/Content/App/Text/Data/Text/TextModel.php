<?php
namespace Nemundo\Content\App\Text\Data\Text;
class TextModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

protected function loadModel() {
$this->tableName = "text_text";
$this->aliasTableName = "text_text";
$this->label = "Text";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "text_text";
$this->id->externalTableName = "text_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "text_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "text_text";
$this->text->externalTableName = "text_text";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "text_text_text";
$this->text->label = "Text";
$this->text->allowNullValue = true;
$this->text->length = 255;

}
}