<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var StyleTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $styleType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->styleType = $this->getModelValue($model->styleType);
}
}