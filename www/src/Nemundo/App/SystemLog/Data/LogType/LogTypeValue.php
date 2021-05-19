<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
}