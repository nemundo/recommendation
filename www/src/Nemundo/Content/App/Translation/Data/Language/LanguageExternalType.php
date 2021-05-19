<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguageExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $code;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $language;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $defaultLanguage;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LanguageModel::class;
$this->externalTableName = "translation_language";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->code = new \Nemundo\Model\Type\Text\TextType();
$this->code->fieldName = "code";
$this->code->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->code->externalTableName = $this->externalTableName;
$this->code->aliasFieldName = $this->code->tableName . "_" . $this->code->fieldName;
$this->code->label = "Code";
$this->addType($this->code);

$this->language = new \Nemundo\Model\Type\Text\TextType();
$this->language->fieldName = "language";
$this->language->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->language->externalTableName = $this->externalTableName;
$this->language->aliasFieldName = $this->language->tableName . "_" . $this->language->fieldName;
$this->language->label = "Language";
$this->addType($this->language);

$this->defaultLanguage = new \Nemundo\Model\Type\Number\YesNoType();
$this->defaultLanguage->fieldName = "default_language";
$this->defaultLanguage->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->defaultLanguage->externalTableName = $this->externalTableName;
$this->defaultLanguage->aliasFieldName = $this->defaultLanguage->tableName . "_" . $this->defaultLanguage->fieldName;
$this->defaultLanguage->label = "Default Language";
$this->addType($this->defaultLanguage);

}
}