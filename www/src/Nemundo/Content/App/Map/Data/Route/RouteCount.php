<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RouteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteModel();
}
}