<?php
namespace Nemundo\Content\App\Job\Data\Job;
class JobDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var JobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
}