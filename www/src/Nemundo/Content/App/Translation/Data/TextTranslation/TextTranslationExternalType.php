<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $languageId;

/**
* @var \Nemundo\Content\App\Translation\Data\Language\LanguageExternalType
*/
public $language;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $translationId;

/**
* @var \Nemundo\Content\App\Translation\Data\Translation\TranslationExternalType
*/
public $translation;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TextTranslationModel::class;
$this->externalTableName = "translation_text_translation";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->languageId = new \Nemundo\Model\Type\Id\IdType();
$this->languageId->fieldName = "language";
$this->languageId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->languageId->aliasFieldName = $this->languageId->tableName ."_".$this->languageId->fieldName;
$this->languageId->label = "Language";
$this->addType($this->languageId);

$this->text = new \Nemundo\Model\Type\Text\TextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

$this->translationId = new \Nemundo\Model\Type\Id\IdType();
$this->translationId->fieldName = "translation";
$this->translationId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->translationId->aliasFieldName = $this->translationId->tableName ."_".$this->translationId->fieldName;
$this->translationId->label = "Translation";
$this->addType($this->translationId);

}
public function loadLanguage() {
if ($this->language == null) {
$this->language = new \Nemundo\Content\App\Translation\Data\Language\LanguageExternalType(null, $this->parentFieldName . "_language");
$this->language->fieldName = "language";
$this->language->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->language->aliasFieldName = $this->language->tableName ."_".$this->language->fieldName;
$this->language->label = "Language";
$this->addType($this->language);
}
return $this;
}
public function loadTranslation() {
if ($this->translation == null) {
$this->translation = new \Nemundo\Content\App\Translation\Data\Translation\TranslationExternalType(null, $this->parentFieldName . "_translation");
$this->translation->fieldName = "translation";
$this->translation->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->translation->aliasFieldName = $this->translation->tableName ."_".$this->translation->fieldName;
$this->translation->label = "Translation";
$this->addType($this->translation);
}
return $this;
}
}