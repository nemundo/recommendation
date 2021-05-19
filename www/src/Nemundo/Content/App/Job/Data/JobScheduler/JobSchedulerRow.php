<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var JobSchedulerModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var bool
*/
public $done;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var int
*/
public $duration;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $finishedDateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->done = boolval($this->getModelValue($model->done));
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->duration = intval($this->getModelValue($model->duration));
$this->finishedDateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->finishedDateTime));
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}