<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesContent;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimeSeriesContentId extends AbstractModelIdValue {
/**
* @var TimeSeriesContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesContentModel();
}
}