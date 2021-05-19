<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PeriodTypeModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $periodType;

public function __construct() {
parent::__construct();
$this->model = new PeriodTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->periodType, $this->periodType);
$id = parent::save();
return $id;
}
}