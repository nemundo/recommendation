<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $priority;

protected function loadModel() {
$this->tableName = "issuetracker_priority";
$this->aliasTableName = "issuetracker_priority";
$this->label = "Priority";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "issuetracker_priority";
$this->id->externalTableName = "issuetracker_priority";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "issuetracker_priority_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->priority = new \Nemundo\Model\Type\Text\TextType($this);
$this->priority->tableName = "issuetracker_priority";
$this->priority->externalTableName = "issuetracker_priority";
$this->priority->fieldName = "priority";
$this->priority->aliasFieldName = "issuetracker_priority_priority";
$this->priority->label = "Priority";
$this->priority->allowNullValue = true;
$this->priority->length = 255;

}
}