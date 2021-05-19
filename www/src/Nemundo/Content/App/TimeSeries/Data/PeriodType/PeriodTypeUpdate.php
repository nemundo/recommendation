<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
use Nemundo\Model\Data\AbstractModelUpdate;
class PeriodTypeUpdate extends AbstractModelUpdate {
/**
* @var PeriodTypeModel
*/
public $model;

/**
* @var string
*/
public $periodType;

public function __construct() {
parent::__construct();
$this->model = new PeriodTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->periodType, $this->periodType);
parent::update();
}
}