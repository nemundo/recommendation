<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssueRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var IssueModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $issue;

/**
* @var string
*/
public $description;

/**
* @var int
*/
public $priorityId;

/**
* @var \Nemundo\Content\App\IssueTracker\Data\Priority\PriorityRow
*/
public $priority;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->issue = $this->getModelValue($model->issue);
$this->description = $this->getModelValue($model->description);
$this->priorityId = intval($this->getModelValue($model->priorityId));
if ($model->priority !== null) {
$this->loadNemundoContentAppIssueTrackerDataPriorityPrioritypriorityRow($model->priority);
}
}
private function loadNemundoContentAppIssueTrackerDataPriorityPrioritypriorityRow($model) {
$this->priority = new \Nemundo\Content\App\IssueTracker\Data\Priority\PriorityRow($this->row, $model);
}
}