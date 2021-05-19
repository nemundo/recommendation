<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
use Nemundo\Model\Data\AbstractModelUpdate;
class UnitUpdate extends AbstractModelUpdate {
/**
* @var UnitModel
*/
public $model;

/**
* @var string
*/
public $unit;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->unit, $this->unit);
parent::update();
}
}