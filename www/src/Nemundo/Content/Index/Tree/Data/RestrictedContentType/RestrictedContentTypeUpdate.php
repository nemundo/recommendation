<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class RestrictedContentTypeUpdate extends AbstractModelUpdate {
/**
* @var RestrictedContentTypeModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $restrictedContentTypeId;

public function __construct() {
parent::__construct();
$this->model = new RestrictedContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->restrictedContentTypeId, $this->restrictedContentTypeId);
parent::update();
}
}