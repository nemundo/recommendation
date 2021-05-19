<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
class GeoContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var GeoContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoContentTypeModel();
}
}