<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LogTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $logType;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->logType, $this->logType);
$id = parent::save();
return $id;
}
}