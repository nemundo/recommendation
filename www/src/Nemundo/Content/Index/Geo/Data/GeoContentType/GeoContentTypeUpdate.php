<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class GeoContentTypeUpdate extends AbstractModelUpdate {
/**
* @var GeoContentTypeModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new GeoContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}