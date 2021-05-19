<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "translation_language";
$this->aliasTableName = "translation_language";
$this->label = "Language";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_language";
$this->id->externalTableName = "translation_language";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_language_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->code = new \Nemundo\Model\Type\Text\TextType($this);
$this->code->tableName = "translation_language";
$this->code->externalTableName = "translation_language";
$this->code->fieldName = "code";
$this->code->aliasFieldName = "translation_language_code";
$this->code->label = "Code";
$this->code->allowNullValue = true;
$this->code->length = 50;

$this->language = new \Nemundo\Model\Type\Text\TextType($this);
$this->language->tableName = "translation_language";
$this->language->externalTableName = "translation_language";
$this->language->fieldName = "language";
$this->language->aliasFieldName = "translation_language_language";
$this->language->label = "Language";
$this->language->allowNullValue = true;
$this->language->length = 255;

$this->defaultLanguage = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->defaultLanguage->tableName = "translation_language";
$this->defaultLanguage->externalTableName = "translation_language";
$this->defaultLanguage->fieldName = "default_language";
$this->defaultLanguage->aliasFieldName = "translation_language_default_language";
$this->defaultLanguage->label = "Default Language";
$this->defaultLanguage->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "code";
$index->addType($this->code);

}
}