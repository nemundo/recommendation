<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimeSeriesId extends AbstractModelIdValue {
/**
* @var TimeSeriesModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesModel();
}
}