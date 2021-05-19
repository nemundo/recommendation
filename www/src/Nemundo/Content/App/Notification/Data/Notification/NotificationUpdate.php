<?php
namespace Nemundo\Content\App\Notification\Data\Notification;
use Nemundo\Model\Data\AbstractModelUpdate;
class NotificationUpdate extends AbstractModelUpdate {
/**
* @var NotificationModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->isDeleted, $this->isDeleted);
parent::update();
}
}