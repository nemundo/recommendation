<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $priority;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PriorityModel::class;
$this->externalTableName = "issuetracker_priority";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->priority = new \Nemundo\Model\Type\Text\TextType();
$this->priority->fieldName = "priority";
$this->priority->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->priority->externalTableName = $this->externalTableName;
$this->priority->aliasFieldName = $this->priority->tableName . "_" . $this->priority->fieldName;
$this->priority->label = "Priority";
$this->addType($this->priority);

}
}