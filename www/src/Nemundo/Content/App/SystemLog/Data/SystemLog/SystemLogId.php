<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class SystemLogId extends AbstractModelIdValue {
/**
* @var SystemLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
}