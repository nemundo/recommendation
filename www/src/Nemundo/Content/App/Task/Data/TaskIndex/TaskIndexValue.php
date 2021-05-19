<?php
namespace Nemundo\Content\App\Task\Data\TaskIndex;
class TaskIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TaskIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TaskIndexModel();
}
}