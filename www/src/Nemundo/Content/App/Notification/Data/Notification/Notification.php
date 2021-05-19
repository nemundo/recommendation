<?php
namespace Nemundo\Content\App\Notification\Data\Notification;
class Notification extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var NotificationModel
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
public $isDeleted;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
$id = parent::save();
return $id;
}
}