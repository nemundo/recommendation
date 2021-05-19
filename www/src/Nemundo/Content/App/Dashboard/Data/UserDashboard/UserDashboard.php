<?php
namespace Nemundo\Content\App\Dashboard\Data\UserDashboard;
class UserDashboard extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UserDashboardModel
*/
protected $model;

/**
* @var string
*/
public $dashboard;

public function __construct() {
parent::__construct();
$this->model = new UserDashboardModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->dashboard, $this->dashboard);
$id = parent::save();
return $id;
}
}