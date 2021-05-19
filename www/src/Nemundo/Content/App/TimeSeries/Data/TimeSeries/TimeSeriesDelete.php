<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeriesDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimeSeriesModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesModel();
}
}