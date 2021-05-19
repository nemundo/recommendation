<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var DistanceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DistanceModel();
}
}