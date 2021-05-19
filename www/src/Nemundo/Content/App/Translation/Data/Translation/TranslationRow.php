<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
class TranslationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TranslationModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var bool
*/
public $active;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->active = boolval($this->getModelValue($model->active));
}
}