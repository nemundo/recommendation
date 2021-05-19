<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UnitModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
}