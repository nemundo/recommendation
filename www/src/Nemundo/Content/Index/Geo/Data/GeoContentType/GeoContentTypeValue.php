<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
class GeoContentTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var GeoContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoContentTypeModel();
}
}