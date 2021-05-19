<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var GeoIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
}
}