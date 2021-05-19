<?php
namespace Nemundo\Content\App\Text\Data\LargeText;
class LargeTextExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LargeTextModel::class;
$this->externalTableName = "text_large_text";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->largeText = new \Nemundo\Model\Type\Text\LargeTextType();
$this->largeText->fieldName = "large_text";
$this->largeText->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->largeText->externalTableName = $this->externalTableName;
$this->largeText->aliasFieldName = $this->largeText->tableName . "_" . $this->largeText->fieldName;
$this->largeText->label = "Large Text";
$this->addType($this->largeText);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->externalTableName = $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

}
}