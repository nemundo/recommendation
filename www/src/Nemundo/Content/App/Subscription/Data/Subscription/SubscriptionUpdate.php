<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
use Nemundo\Model\Data\AbstractModelUpdate;
class SubscriptionUpdate extends AbstractModelUpdate {
/**
* @var SubscriptionModel
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

public function __construct() {
parent::__construct();
$this->model = new SubscriptionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}