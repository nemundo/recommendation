<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
}