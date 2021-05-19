<?php
namespace Nemundo\Content\App\ToDo\Data\ToDo;
use Nemundo\Model\Id\AbstractModelIdValue;
class ToDoId extends AbstractModelIdValue {
/**
* @var ToDoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
}