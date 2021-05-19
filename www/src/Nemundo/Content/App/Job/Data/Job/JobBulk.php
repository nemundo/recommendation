<?php
namespace Nemundo\Content\App\Job\Data\Job;
class JobBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var JobModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->job, $this->job);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}