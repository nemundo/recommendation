<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
class SubscriptionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubscriptionModel();
}
}