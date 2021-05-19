<?php
namespace Nemundo\Content\App\Subscription\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SubscriptionModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Subscription\Data\Subscription\SubscriptionModel());
}
}