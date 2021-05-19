<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var GeoIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
}
}