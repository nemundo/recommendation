<?php
namespace Nemundo\Content\App\Task\Data\TaskIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class TaskIndexId extends AbstractModelIdValue {
/**
* @var TaskIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TaskIndexModel();
}
}