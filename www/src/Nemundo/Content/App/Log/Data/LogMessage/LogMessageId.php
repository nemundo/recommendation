<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
use Nemundo\Model\Id\AbstractModelIdValue;
class LogMessageId extends AbstractModelIdValue {
/**
* @var LogMessageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogMessageModel();
}
}