<?php
namespace Nemundo\Content\App\Job\Data\Job;
use Nemundo\Model\Data\AbstractModelUpdate;
class JobUpdate extends AbstractModelUpdate {
/**
* @var JobModel
*/
public $model;

/**
* @var string
*/
public $job;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->job, $this->job);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}