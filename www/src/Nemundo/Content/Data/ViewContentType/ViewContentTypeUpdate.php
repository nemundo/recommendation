<?php
namespace Nemundo\Content\Data\ViewContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class ViewContentTypeUpdate extends AbstractModelUpdate {
/**
* @var ViewContentTypeModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}