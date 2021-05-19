<?php
namespace Nemundo\Content\App\Task\Data\TaskIndex;
class TaskIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TaskIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $task;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->task = $this->getModelValue($model->task);
$value = $this->getModelValue($model->deadline);
if ($value !== "0000-00-00") {
$this->deadline = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->deadline));
}
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}