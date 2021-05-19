<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PeriodModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodModel();
}
}