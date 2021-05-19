<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var PriorityModel
*/
protected $model;

/**
* @var string
*/
public $priority;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->priority, $this->priority);
$id = parent::save();
return $id;
}
}