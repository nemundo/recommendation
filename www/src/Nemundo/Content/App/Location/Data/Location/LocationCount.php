<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LocationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LocationModel();
}
}