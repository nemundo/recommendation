<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PriorityModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
}