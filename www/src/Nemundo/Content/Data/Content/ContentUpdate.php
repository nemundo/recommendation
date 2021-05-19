<?php
namespace Nemundo\Content\Data\Content;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentUpdate extends AbstractModelUpdate {
/**
* @var ContentModel
*/
public $model;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ContentModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}