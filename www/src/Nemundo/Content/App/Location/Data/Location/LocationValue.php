<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LocationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LocationModel();
}
}