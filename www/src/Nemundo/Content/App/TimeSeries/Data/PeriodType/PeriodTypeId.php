<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
use Nemundo\Model\Id\AbstractModelIdValue;
class PeriodTypeId extends AbstractModelIdValue {
/**
* @var PeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodTypeModel();
}
}