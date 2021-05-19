<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PeriodTypeModel();
}
}