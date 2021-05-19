<?php
namespace Nemundo\App\SystemLog\Data\LogType;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogTypeUpdate extends AbstractModelUpdate {
/**
* @var LogTypeModel
*/
public $model;

/**
* @var string
*/
public $logType;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->logType, $this->logType);
parent::update();
}
}