<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SchedulerStatusModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $schedulerStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->schedulerStatus = $this->getModelValue($model->schedulerStatus);
}
}