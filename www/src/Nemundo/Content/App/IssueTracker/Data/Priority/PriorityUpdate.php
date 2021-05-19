<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
use Nemundo\Model\Data\AbstractModelUpdate;
class PriorityUpdate extends AbstractModelUpdate {
/**
* @var PriorityModel
*/
public $model;

/**
* @var string
*/
public $priority;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->priority, $this->priority);
parent::update();
}
}