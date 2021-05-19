<?php
namespace Nemundo\Content\Index\Group\Data\GroupType;
class GroupTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var GroupTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GroupTypeModel();
}
}