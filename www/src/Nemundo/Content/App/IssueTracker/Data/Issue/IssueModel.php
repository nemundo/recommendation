<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssueModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $priorityId;

/**
* @var \Nemundo\Content\App\IssueTracker\Data\Priority\PriorityExternalType
*/
public $priority;

protected function loadModel() {
$this->tableName = "issuetracker_issue";
$this->aliasTableName = "issuetracker_issue";
$this->label = "Issue";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "issuetracker_issue";
$this->id->externalTableName = "issuetracker_issue";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "issuetracker_issue_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->issue = new \Nemundo\Model\Type\Text\TextType($this);
$this->issue->tableName = "issuetracker_issue";
$this->issue->externalTableName = "issuetracker_issue";
$this->issue->fieldName = "issue";
$this->issue->aliasFieldName = "issuetracker_issue_issue";
$this->issue->label = "Issue";
$this->issue->allowNullValue = false;
$this->issue->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "issuetracker_issue";
$this->description->externalTableName = "issuetracker_issue";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "issuetracker_issue_description";
$this->description->label = "Description";
$this->description->allowNullValue = true;

$this->priorityId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->priorityId->tableName = "issuetracker_issue";
$this->priorityId->fieldName = "priority";
$this->priorityId->aliasFieldName = "issuetracker_issue_priority";
$this->priorityId->label = "Priority";
$this->priorityId->allowNullValue = true;

}
public function loadPriority() {
if ($this->priority == null) {
$this->priority = new \Nemundo\Content\App\IssueTracker\Data\Priority\PriorityExternalType($this, "issuetracker_issue_priority");
$this->priority->tableName = "issuetracker_issue";
$this->priority->fieldName = "priority";
$this->priority->aliasFieldName = "issuetracker_issue_priority";
$this->priority->label = "Priority";
}
return $this;
}
}