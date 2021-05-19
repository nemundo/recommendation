<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var GeoIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
}
}