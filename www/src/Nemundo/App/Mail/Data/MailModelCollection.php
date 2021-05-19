<?php
namespace Nemundo\App\Mail\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class MailModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Mail\Data\MailQueue\MailQueueModel());
$this->addModel(new \Nemundo\App\Mail\Data\MailServer\MailServerModel());
}
}