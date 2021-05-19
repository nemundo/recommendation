<?php
namespace Nemundo\Content\App\Dashboard\Data\UserDashboard;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserDashboardUpdate extends AbstractModelUpdate {
/**
* @var UserDashboardModel
*/
public $model;

/**
* @var string
*/
public $dashboard;

public function __construct() {
parent::__construct();
$this->model = new UserDashboardModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->dashboard, $this->dashboard);
parent::update();
}
}