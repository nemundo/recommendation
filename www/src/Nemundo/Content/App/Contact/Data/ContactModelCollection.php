<?php
namespace Nemundo\Content\App\Contact\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ContactModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Contact\Data\Contact\ContactModel());
$this->addModel(new \Nemundo\Content\App\Contact\Data\ContactIndex\ContactIndexModel());
$this->addModel(new \Nemundo\Content\App\Contact\Data\Phone\PhoneModel());
}
}