<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssueDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var IssueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IssueModel();
}
}