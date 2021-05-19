<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssueValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var IssueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IssueModel();
}
}