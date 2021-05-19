<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var UnitModel
*/
protected $model;

/**
* @var string
*/
public $unit;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->unit, $this->unit);
$id = parent::save();
return $id;
}
}