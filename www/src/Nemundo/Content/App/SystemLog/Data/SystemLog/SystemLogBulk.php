<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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