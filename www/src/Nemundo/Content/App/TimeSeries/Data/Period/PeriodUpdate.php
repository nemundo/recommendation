<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
use Nemundo\Model\Data\AbstractModelUpdate;
class PeriodUpdate extends AbstractModelUpdate {
/**
* @var PeriodModel
*/
public $model;

/**
* @var int
*/
public $year;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var int
*/
public $week;

/**
* @var string
*/
public $periodTypeId;

/**
* @var int
*/
public $weekYear;

/**
* @var int
*/
public $month;

/**
* @var int
*/
public $monthYear;

public function __construct() {
parent::__construct();
$this->model = new PeriodModel();
$this->date = new \Nemundo\Core\Type\DateTime\Date();
}
public function update() {
$this->typeValueList->setModelValue($this->model->year, $this->year);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->date, $this->typeValueList);
$property->setValue($this->date);
$this->typeValueList->setModelValue($this->model->week, $this->week);
$this->typeValueList->setModelValue($this->model->periodTypeId, $this->periodTypeId);
$this->typeValueList->setModelValue($this->model->weekYear, $this->weekYear);
$this->typeValueList->setModelValue($this->model->month, $this->month);
$this->typeValueList->setModelValue($this->model->monthYear, $this->monthYear);
parent::update();
}
}