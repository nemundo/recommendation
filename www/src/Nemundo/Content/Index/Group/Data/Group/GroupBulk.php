<?php
namespace Nemundo\Content\Index\Group\Data\Group;
class GroupBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var GroupModel
*/
protected $model;

/**
* @var string
*/
public $group;

/**
* @var string
*/
public $groupTypeId;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new GroupModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->group, $this->group);
$this->typeValueList->setModelValue($this->model->groupTypeId, $this->groupTypeId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}