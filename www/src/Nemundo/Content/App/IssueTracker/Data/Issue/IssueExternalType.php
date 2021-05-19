<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssueExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $issue;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $priorityId;

/**
* @var \Nemundo\Content\App\IssueTracker\Data\Priority\PriorityExternalType
*/
public $priority;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = IssueModel::class;
$this->externalTableName = "issuetracker_issue";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->issue = new \Nemundo\Model\Type\Text\TextType();
$this->issue->fieldName = "issue";
$this->issue->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->issue->externalTableName = $this->externalTableName;
$this->issue->aliasFieldName = $this->issue->tableName . "_" . $this->issue->fieldName;
$this->issue->label = "Issue";
$this->addType($this->issue);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->priorityId = new \Nemundo\Model\Type\Id\IdType();
$this->priorityId->fieldName = "priority";
$this->priorityId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->priorityId->aliasFieldName = $this->priorityId->tableName ."_".$this->priorityId->fieldName;
$this->priorityId->label = "Priority";
$this->addType($this->priorityId);

}
public function loadPriority() {
if ($this->priority == null) {
$this->priority = new \Nemundo\Content\App\IssueTracker\Data\Priority\PriorityExternalType(null, $this->parentFieldName . "_priority");
$this->priority->fieldName = "priority";
$this->priority->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->priority->aliasFieldName = $this->priority->tableName ."_".$this->priority->fieldName;
$this->priority->label = "Priority";
$this->addType($this->priority);
}
return $this;
}
}