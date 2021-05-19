<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UnitModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
}