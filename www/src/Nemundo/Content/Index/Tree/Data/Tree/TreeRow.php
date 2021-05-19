<?php
namespace Nemundo\Content\Index\Tree\Data\Tree;
class TreeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TreeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $childId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $child;

/**
* @var int
*/
public $parentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $parent;

/**
* @var int
*/
public $itemOrder;

/**
* @var string
*/
public $viewId;

/**
* @var \Nemundo\Content\Data\ContentView\ContentViewRow
*/
public $view;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->childId = intval($this->getModelValue($model->childId));
if ($model->child !== null) {
$this->loadNemundoContentDataContentContentchildRow($model->child);
}
$this->parentId = intval($this->getModelValue($model->parentId));
if ($model->parent !== null) {
$this->loadNemundoContentDataContentContentparentRow($model->parent);
}
$this->itemOrder = intval($this->getModelValue($model->itemOrder));
$this->viewId = $this->getModelValue($model->viewId);
if ($model->view !== null) {
$this->loadNemundoContentDataContentViewContentViewviewRow($model->view);
}
}
private function loadNemundoContentDataContentContentchildRow($model) {
$this->child = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentContentparentRow($model) {
$this->parent = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentViewContentViewviewRow($model) {
$this->view = new \Nemundo\Content\Data\ContentView\ContentViewRow($this->row, $model);
}
}