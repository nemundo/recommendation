<?php
namespace Nemundo\User\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class UserModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\User\Data\User\UserModel());
$this->addModel(new \Nemundo\User\Data\UserUsergroup\UserUsergroupModel());
$this->addModel(new \Nemundo\User\Data\Usergroup\UsergroupModel());
}
}