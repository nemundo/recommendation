<?php
namespace Nemundo\Content\App\Job\Data\Job;
class JobPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var JobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
/**
* @return \Nemundo\Content\App\Job\Row\JobCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\Content\App\Job\Row\JobCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}