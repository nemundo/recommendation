<?php
namespace Nemundo\Content\Index\Tree\Data\Tree;
class TreeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TreeModel
*/
protected $model;

/**
* @var string
*/
public $childId;

/**
* @var string
*/
public $parentId;

/**
* @var int
*/
public $itemOrder;

/**
* @var string
*/
public $viewId;

public function __construct() {
parent::__construct();
$this->model = new TreeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->childId, $this->childId);
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$this->typeValueList->setModelValue($this->model->viewId, $this->viewId);
$id = parent::save();
return $id;
}
}