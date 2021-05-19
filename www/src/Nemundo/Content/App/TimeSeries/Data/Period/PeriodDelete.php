<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PeriodModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodModel();
}
}