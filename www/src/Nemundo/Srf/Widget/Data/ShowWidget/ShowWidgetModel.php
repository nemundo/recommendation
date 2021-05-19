<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $showId;

/**
* @var \Nemundo\Srf\Data\Show\ShowExternalType
*/
public $show;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $showLimit;

protected function loadModel() {
$this->tableName = "widget_show_widget";
$this->aliasTableName = "widget_show_widget";
$this->label = "Show Widget";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "widget_show_widget";
$this->id->externalTableName = "widget_show_widget";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "widget_show_widget_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->showId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->showId->tableName = "widget_show_widget";
$this->showId->fieldName = "show";
$this->showId->aliasFieldName = "widget_show_widget_show";
$this->showId->label = "Show";
$this->showId->allowNullValue = true;

$this->showLimit = new \Nemundo\Model\Type\Number\NumberType($this);
$this->showLimit->tableName = "widget_show_widget";
$this->showLimit->externalTableName = "widget_show_widget";
$this->showLimit->fieldName = "show_limit";
$this->showLimit->aliasFieldName = "widget_show_widget_show_limit";
$this->showLimit->label = "Show Limit";
$this->showLimit->allowNullValue = true;

}
public function loadShow() {
if ($this->show == null) {
$this->show = new \Nemundo\Srf\Data\Show\ShowExternalType($this, "widget_show_widget_show");
$this->show->tableName = "widget_show_widget";
$this->show->fieldName = "show";
$this->show->aliasFieldName = "widget_show_widget_show";
$this->show->label = "Show";
}
return $this;
}
}