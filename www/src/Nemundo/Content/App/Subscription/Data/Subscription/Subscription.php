<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
class Subscription extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SubscriptionModel
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

public function __construct() {
parent::__construct();
$this->model = new SubscriptionModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}