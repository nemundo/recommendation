<?php
namespace Hackathon\Data\NewsType;
use Nemundo\Model\Data\AbstractModelUpdate;
class NewsTypeUpdate extends AbstractModelUpdate {
/**
* @var NewsTypeModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}