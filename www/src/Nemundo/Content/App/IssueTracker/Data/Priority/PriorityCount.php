<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PriorityModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
}