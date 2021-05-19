<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PeriodModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodModel();
}
}