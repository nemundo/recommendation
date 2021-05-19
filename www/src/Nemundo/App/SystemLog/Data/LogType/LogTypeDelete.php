<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
}