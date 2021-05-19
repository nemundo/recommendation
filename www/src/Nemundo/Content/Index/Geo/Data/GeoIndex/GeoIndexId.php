<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class GeoIndexId extends AbstractModelIdValue {
/**
* @var GeoIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
}
}