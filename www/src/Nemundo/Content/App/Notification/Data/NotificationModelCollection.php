<?php
namespace Nemundo\Content\App\Notification\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class NotificationModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Notification\Data\Notification\NotificationModel());
}
}