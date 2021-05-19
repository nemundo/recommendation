<?php
namespace Nemundo\Content\App\Map\Data\Route;
use Nemundo\Model\Id\AbstractModelIdValue;
class RouteId extends AbstractModelIdValue {
/**
* @var RouteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteModel();
}
}