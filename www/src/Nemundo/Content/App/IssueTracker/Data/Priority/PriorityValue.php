<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PriorityModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
}