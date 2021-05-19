<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LogMessageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogMessageModel();
}
}