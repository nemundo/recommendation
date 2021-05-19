<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
use Nemundo\Model\Id\AbstractModelIdValue;
class DistanceId extends AbstractModelIdValue {
/**
* @var DistanceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DistanceModel();
}
}