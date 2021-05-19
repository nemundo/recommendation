<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
use Nemundo\Model\Data\AbstractModelUpdate;
class IssueUpdate extends AbstractModelUpdate {
/**
* @var IssueModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->issue, $this->issue);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->priorityId, $this->priorityId);
parent::update();
}
}