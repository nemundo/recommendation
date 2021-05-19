<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ApplicationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationModel();
}
}