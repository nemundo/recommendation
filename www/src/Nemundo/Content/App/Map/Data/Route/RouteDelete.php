<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RouteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteModel();
}
}