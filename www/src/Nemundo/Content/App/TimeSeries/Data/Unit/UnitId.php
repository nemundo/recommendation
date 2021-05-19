<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
use Nemundo\Model\Id\AbstractModelIdValue;
class UnitId extends AbstractModelIdValue {
/**
* @var UnitModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
}