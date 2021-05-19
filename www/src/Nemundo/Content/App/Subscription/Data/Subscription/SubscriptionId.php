<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
use Nemundo\Model\Id\AbstractModelIdValue;
class SubscriptionId extends AbstractModelIdValue {
/**
* @var SubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubscriptionModel();
}
}