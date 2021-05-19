<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodTypeModel();
}
}