<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TextTranslationModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $languageId;

/**
* @var \Nemundo\Content\App\Translation\Row\LanguageCustomRow
*/
public $language;

/**
* @var string
*/
public $text;

/**
* @var int
*/
public $translationId;

/**
* @var \Nemundo\Content\App\Translation\Data\Translation\TranslationRow
*/
public $translation;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->languageId = intval($this->getModelValue($model->languageId));
if ($model->language !== null) {
$this->loadNemundoContentAppTranslationDataLanguageLanguagelanguageRow($model->language);
}
$this->text = $this->getModelValue($model->text);
$this->translationId = intval($this->getModelValue($model->translationId));
if ($model->translation !== null) {
$this->loadNemundoContentAppTranslationDataTranslationTranslationtranslationRow($model->translation);
}
}
private function loadNemundoContentAppTranslationDataLanguageLanguagelanguageRow($model) {
$this->language = new \Nemundo\Content\App\Translation\Row\LanguageCustomRow($this->row, $model);
}
private function loadNemundoContentAppTranslationDataTranslationTranslationtranslationRow($model) {
$this->translation = new \Nemundo\Content\App\Translation\Data\Translation\TranslationRow($this->row, $model);
}
}