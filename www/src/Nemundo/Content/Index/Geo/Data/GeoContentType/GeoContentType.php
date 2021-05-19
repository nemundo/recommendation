<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
class GeoContentType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var GeoContentTypeModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new GeoContentTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}