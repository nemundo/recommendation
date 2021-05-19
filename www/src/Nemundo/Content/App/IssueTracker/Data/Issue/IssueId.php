<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
use Nemundo\Model\Id\AbstractModelIdValue;
class IssueId extends AbstractModelIdValue {
/**
* @var IssueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IssueModel();
}
}