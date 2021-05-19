<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PeriodTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $periodType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->periodType = $this->getModelValue($model->periodType);
}
}