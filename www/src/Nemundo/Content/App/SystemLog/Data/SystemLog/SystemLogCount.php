<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SystemLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
}