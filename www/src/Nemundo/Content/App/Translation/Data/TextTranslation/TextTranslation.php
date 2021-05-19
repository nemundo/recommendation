<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslation extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TextTranslationModel
*/
protected $model;

/**
* @var string
*/
public $languageId;

/**
* @var string
*/
public $text;

/**
* @var string
*/
public $translationId;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->languageId, $this->languageId);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->translationId, $this->translationId);
$id = parent::save();
return $id;
}
}