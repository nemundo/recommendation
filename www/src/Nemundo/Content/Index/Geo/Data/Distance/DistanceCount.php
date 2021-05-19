<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DistanceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DistanceModel();
}
}