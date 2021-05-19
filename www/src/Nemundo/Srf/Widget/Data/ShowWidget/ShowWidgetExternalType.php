<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ShowWidgetModel::class;
$this->externalTableName = "widget_show_widget";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->showId = new \Nemundo\Model\Type\Id\IdType();
$this->showId->fieldName = "show";
$this->showId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->showId->aliasFieldName = $this->showId->tableName ."_".$this->showId->fieldName;
$this->showId->label = "Show";
$this->addType($this->showId);

$this->showLimit = new \Nemundo\Model\Type\Number\NumberType();
$this->showLimit->fieldName = "show_limit";
$this->showLimit->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->showLimit->externalTableName = $this->externalTableName;
$this->showLimit->aliasFieldName = $this->showLimit->tableName . "_" . $this->showLimit->fieldName;
$this->showLimit->label = "Show Limit";
$this->addType($this->showLimit);

}
public function loadShow() {
if ($this->show == null) {
$this->show = new \Nemundo\Srf\Data\Show\ShowExternalType(null, $this->parentFieldName . "_show");
$this->show->fieldName = "show";
$this->show->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->show->aliasFieldName = $this->show->tableName ."_".$this->show->fieldName;
$this->show->label = "Show";
$this->addType($this->show);
}
return $this;
}
}