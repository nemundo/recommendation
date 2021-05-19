<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class Language extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LanguageModel
*/
protected $model;

/**
* @var string
*/
public $code;

/**
* @var string
*/
public $language;

/**
* @var bool
*/
public $defaultLanguage;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->code, $this->code);
$this->typeValueList->setModelValue($this->model->language, $this->language);
$this->typeValueList->setModelValue($this->model->defaultLanguage, $this->defaultLanguage);
$id = parent::save();
return $id;
}
}