<?php
namespace Nemundo\Content\App\Message\Data\Message;
use Nemundo\Model\Data\AbstractModelUpdate;
class MessageUpdate extends AbstractModelUpdate {
/**
* @var MessageModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->toId, $this->toId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}