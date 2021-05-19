<?php
namespace Hackathon\Data\Snb;
class SnbRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SnbModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $month;

/**
* @var int
*/
public $year;

/**
* @var int
*/
public $devisen;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->month = intval($this->getModelValue($model->month));
$this->year = intval($this->getModelValue($model->year));
$this->devisen = intval($this->getModelValue($model->devisen));
}
}