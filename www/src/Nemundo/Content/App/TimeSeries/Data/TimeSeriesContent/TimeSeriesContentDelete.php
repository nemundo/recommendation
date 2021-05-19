<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesContent;
class TimeSeriesContentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimeSeriesContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesContentModel();
}
}