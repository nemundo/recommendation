<?php
namespace Nemundo\Content\App\Task\Data\TaskIndex;
class TaskIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TaskIndexModel
*/
protected $model;

/**
* @var string
*/
public $task;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new TaskIndexModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->task, $this->task);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}