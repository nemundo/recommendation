<?php
namespace Nemundo\Content\App\Message\Data\Message;
class Message extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MessageModel
*/
protected $model;

/**
* @var string
*/
public $toId;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new MessageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->toId, $this->toId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}