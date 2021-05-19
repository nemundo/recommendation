<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RouteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteModel();
}
}