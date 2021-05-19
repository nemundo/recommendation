<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LanguageModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->code = $this->getModelValue($model->code);
$this->language = $this->getModelValue($model->language);
$this->defaultLanguage = boolval($this->getModelValue($model->defaultLanguage));
}
}