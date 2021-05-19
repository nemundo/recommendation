<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LogMessageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogMessageModel();
}
}