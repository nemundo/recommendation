<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ApplicationContentTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$id = parent::save();
return $id;
}
}