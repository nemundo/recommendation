<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var RestrictedContentTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->restrictedContentTypeId, $this->restrictedContentTypeId);
$id = parent::save();
return $id;
}
}