<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class Issue extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var IssueModel
*/
protected $model;

/**
* @var string
*/
public $issue;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $priorityId;

public function __construct() {
parent::__construct();
$this->model = new IssueModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->issue, $this->issue);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->priorityId, $this->priorityId);
$id = parent::save();
return $id;
}
}