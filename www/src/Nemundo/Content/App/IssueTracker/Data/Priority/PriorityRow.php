<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PriorityModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $priority;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->priority = $this->getModelValue($model->priority);
}
}