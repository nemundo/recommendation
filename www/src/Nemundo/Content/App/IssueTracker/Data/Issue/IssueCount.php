<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssueCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var IssueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IssueModel();
}
}