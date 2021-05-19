<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SystemLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
}