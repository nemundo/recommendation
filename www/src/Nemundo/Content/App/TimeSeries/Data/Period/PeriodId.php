<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
use Nemundo\Model\Id\AbstractModelIdValue;
class PeriodId extends AbstractModelIdValue {
/**
* @var PeriodModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodModel();
}
}