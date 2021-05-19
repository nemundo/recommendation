<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
use Nemundo\Model\Id\AbstractModelIdValue;
class GeoContentTypeId extends AbstractModelIdValue {
/**
* @var GeoContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoContentTypeModel();
}
}