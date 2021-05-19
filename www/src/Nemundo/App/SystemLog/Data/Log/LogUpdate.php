<?php
namespace Nemundo\App\SystemLog\Data\Log;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogUpdate extends AbstractModelUpdate {
/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $applicationId;

/**
* @var string
*/
public $logTypeId;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->logTypeId, $this->logTypeId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}