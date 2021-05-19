<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var DistanceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DistanceModel();
}
}