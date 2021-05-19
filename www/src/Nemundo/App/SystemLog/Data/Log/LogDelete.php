<?php
namespace Nemundo\App\SystemLog\Data\Log;
class LogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
}