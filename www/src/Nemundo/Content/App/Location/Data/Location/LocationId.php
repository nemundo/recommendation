<?php
namespace Nemundo\Content\App\Location\Data\Location;
use Nemundo\Model\Id\AbstractModelIdValue;
class LocationId extends AbstractModelIdValue {
/**
* @var LocationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LocationModel();
}
}