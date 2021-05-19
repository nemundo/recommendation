<?php
namespace Nemundo\Content\Index\Tree\Data\Tree;
class TreeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $childId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $child;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $parentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parent;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $itemOrder;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $viewId;

/**
* @var \Nemundo\Content\Data\ContentView\ContentViewExternalType
*/
public $view;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TreeModel::class;
$this->externalTableName = "content_tree";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->childId = new \Nemundo\Model\Type\Id\IdType();
$this->childId->fieldName = "child";
$this->childId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->childId->aliasFieldName = $this->childId->tableName ."_".$this->childId->fieldName;
$this->childId->label = "Child";
$this->addType($this->childId);

$this->parentId = new \Nemundo\Model\Type\Id\IdType();
$this->parentId->fieldName = "parent";
$this->parentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parentId->aliasFieldName = $this->parentId->tableName ."_".$this->parentId->fieldName;
$this->parentId->label = "Parent";
$this->addType($this->parentId);

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->externalTableName = $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "Item Order";
$this->addType($this->itemOrder);

$this->viewId = new \Nemundo\Model\Type\Id\IdType();
$this->viewId->fieldName = "view";
$this->viewId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->viewId->aliasFieldName = $this->viewId->tableName ."_".$this->viewId->fieldName;
$this->viewId->label = "View";
$this->addType($this->viewId);

}
public function loadChild() {
if ($this->child == null) {
$this->child = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_child");
$this->child->fieldName = "child";
$this->child->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->child->aliasFieldName = $this->child->tableName ."_".$this->child->fieldName;
$this->child->label = "Child";
$this->addType($this->child);
}
return $this;
}
public function loadParent() {
if ($this->parent == null) {
$this->parent = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_parent");
$this->parent->fieldName = "parent";
$this->parent->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parent->aliasFieldName = $this->parent->tableName ."_".$this->parent->fieldName;
$this->parent->label = "Parent";
$this->addType($this->parent);
}
return $this;
}
public function loadView() {
if ($this->view == null) {
$this->view = new \Nemundo\Content\Data\ContentView\ContentViewExternalType(null, $this->parentFieldName . "_view");
$this->view->fieldName = "view";
$this->view->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->view->aliasFieldName = $this->view->tableName ."_".$this->view->fieldName;
$this->view->label = "View";
$this->addType($this->view);
}
return $this;
}
}