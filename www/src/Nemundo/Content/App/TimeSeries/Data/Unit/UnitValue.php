<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UnitModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
}