<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodTypeModel();
}
}