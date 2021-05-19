<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
class SubscriptionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubscriptionModel();
}
}