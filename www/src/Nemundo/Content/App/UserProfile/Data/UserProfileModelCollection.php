<?php
namespace Nemundo\Content\App\UserProfile\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class UserProfileModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\UserProfile\Data\UserProfile\UserProfileModel());
}
}