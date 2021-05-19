<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
use Nemundo\Model\Id\AbstractModelIdValue;
class PriorityId extends AbstractModelIdValue {
/**
* @var PriorityModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
}