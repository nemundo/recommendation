<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
class SubscriptionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubscriptionModel();
}
}