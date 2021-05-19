<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLog extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SystemLogModel
*/
protected $model;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}