<?php
namespace Nemundo\Content\App\Text\Data\LargeText;
class LargeTextModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $largeText;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

protected function loadModel() {
$this->tableName = "text_large_text";
$this->aliasTableName = "text_large_text";
$this->label = "Large Text";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "text_large_text";
$this->id->externalTableName = "text_large_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "text_large_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->largeText = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->largeText->tableName = "text_large_text";
$this->largeText->externalTableName = "text_large_text";
$this->largeText->fieldName = "large_text";
$this->largeText->aliasFieldName = "text_large_text_large_text";
$this->largeText->label = "Large Text";
$this->largeText->allowNullValue = true;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "text_large_text";
$this->subject->externalTableName = "text_large_text";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "text_large_text_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = true;
$this->subject->length = 255;

}
}