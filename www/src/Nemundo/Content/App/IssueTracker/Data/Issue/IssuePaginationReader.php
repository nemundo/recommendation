<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssuePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var IssueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IssueModel();
}
/**
* @return IssueRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new IssueRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}