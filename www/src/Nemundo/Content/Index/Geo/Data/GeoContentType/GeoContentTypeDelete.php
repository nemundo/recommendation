<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
class GeoContentTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var GeoContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoContentTypeModel();
}
}