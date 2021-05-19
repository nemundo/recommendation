<?php
namespace Nemundo\Content\App\Inbox\Data\Inbox;
class InboxBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var InboxModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $contentId;

/**
* @var bool
*/
public $deleted;

/**
* @var string
*/
public $fromId;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new InboxModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->deleted, $this->deleted);
$this->typeValueList->setModelValue($this->model->fromId, $this->fromId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}