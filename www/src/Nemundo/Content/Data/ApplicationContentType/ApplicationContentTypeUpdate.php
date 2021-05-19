<?php
namespace Nemundo\Content\Data\ApplicationContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class ApplicationContentTypeUpdate extends AbstractModelUpdate {
/**
* @var ApplicationContentTypeModel
*/
public $model;

/**
* @var string
*/
public $applicationId;

/**
* @var string
*/
public $contentTypeId;

/**
* @var bool
*/
public $setupStatus;

public function __construct() {
parent::__construct();
$this->model = new ApplicationContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
parent::update();
}
}