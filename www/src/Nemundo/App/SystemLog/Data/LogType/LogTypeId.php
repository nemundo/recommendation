<?php
namespace Nemundo\App\SystemLog\Data\LogType;
use Nemundo\Model\Id\AbstractModelIdValue;
class LogTypeId extends AbstractModelIdValue {
/**
* @var LogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
}