<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessage extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LogMessageModel
*/
protected $model;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new LogMessageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}