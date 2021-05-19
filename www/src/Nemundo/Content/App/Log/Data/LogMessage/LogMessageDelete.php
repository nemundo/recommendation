<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LogMessageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogMessageModel();
}
}