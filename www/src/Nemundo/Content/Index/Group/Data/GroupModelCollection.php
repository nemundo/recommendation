<?php
namespace Nemundo\Content\Index\Group\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class GroupModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Group\Data\Group\GroupModel());
$this->addModel(new \Nemundo\Content\Index\Group\Data\GroupType\GroupTypeModel());
$this->addModel(new \Nemundo\Content\Index\Group\Data\GroupUser\GroupUserModel());
}
}