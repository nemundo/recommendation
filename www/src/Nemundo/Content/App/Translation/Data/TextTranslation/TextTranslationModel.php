<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $translationId;

/**
* @var \Nemundo\Content\App\Translation\Data\Translation\TranslationExternalType
*/
public $translation;

protected function loadModel() {
$this->tableName = "translation_text_translation";
$this->aliasTableName = "translation_text_translation";
$this->label = "Text Translation";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_text_translation";
$this->id->externalTableName = "translation_text_translation";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_text_translation_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->languageId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->languageId->tableName = "translation_text_translation";
$this->languageId->fieldName = "language";
$this->languageId->aliasFieldName = "translation_text_translation_language";
$this->languageId->label = "Language";
$this->languageId->allowNullValue = true;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "translation_text_translation";
$this->text->externalTableName = "translation_text_translation";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "translation_text_translation_text";
$this->text->label = "Text";
$this->text->allowNullValue = true;
$this->text->length = 255;

$this->translationId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->translationId->tableName = "translation_text_translation";
$this->translationId->fieldName = "translation";
$this->translationId->aliasFieldName = "translation_text_translation_translation";
$this->translationId->label = "Translation";
$this->translationId->allowNullValue = true;

}
public function loadLanguage() {
if ($this->language == null) {
$this->language = new \Nemundo\Content\App\Translation\Data\Language\LanguageExternalType($this, "translation_text_translation_language");
$this->language->tableName = "translation_text_translation";
$this->language->fieldName = "language";
$this->language->aliasFieldName = "translation_text_translation_language";
$this->language->label = "Language";
}
return $this;
}
public function loadTranslation() {
if ($this->translation == null) {
$this->translation = new \Nemundo\Content\App\Translation\Data\Translation\TranslationExternalType($this, "translation_text_translation_translation");
$this->translation->tableName = "translation_text_translation";
$this->translation->fieldName = "translation";
$this->translation->aliasFieldName = "translation_text_translation_translation";
$this->translation->label = "Translation";
}
return $this;
}
}