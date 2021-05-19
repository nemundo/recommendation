<?php
namespace Nemundo\Content\Index\Group\Data\GroupUser;
class GroupUserCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var GroupUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GroupUserModel();
}
}