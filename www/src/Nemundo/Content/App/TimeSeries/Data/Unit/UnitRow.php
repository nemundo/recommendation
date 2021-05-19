<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UnitModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $unit;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->unit = $this->getModelValue($model->unit);
}
}