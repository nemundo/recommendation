<?php
namespace Nemundo\Content\Index\Group\Data\Group;
use Nemundo\Model\Data\AbstractModelUpdate;
class GroupUpdate extends AbstractModelUpdate {
/**
* @var GroupModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->group, $this->group);
$this->typeValueList->setModelValue($this->model->groupTypeId, $this->groupTypeId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}