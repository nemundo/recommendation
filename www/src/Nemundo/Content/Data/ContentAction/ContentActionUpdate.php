<?php
namespace Nemundo\Content\Data\ContentAction;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentActionUpdate extends AbstractModelUpdate {
/**
* @var ContentActionModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}