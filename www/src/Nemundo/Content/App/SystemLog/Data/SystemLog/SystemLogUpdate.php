<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class SystemLogUpdate extends AbstractModelUpdate {
/**
* @var SystemLogModel
*/
public $model;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}