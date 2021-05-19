<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StyleRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var StyleModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $styleTypeId;

/**
* @var \Nemundo\App\CssDesigner\Data\StyleType\StyleTypeRow
*/
public $styleType;

/**
* @var string
*/
public $style;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->styleTypeId = intval($this->getModelValue($model->styleTypeId));
if ($model->styleType !== null) {
$this->loadNemundoAppCssDesignerDataStyleTypeStyleTypestyleTypeRow($model->styleType);
}
$this->style = $this->getModelValue($model->style);
}
private function loadNemundoAppCssDesignerDataStyleTypeStyleTypestyleTypeRow($model) {
$this->styleType = new \Nemundo\App\CssDesigner\Data\StyleType\StyleTypeRow($this->row, $model);
}
}