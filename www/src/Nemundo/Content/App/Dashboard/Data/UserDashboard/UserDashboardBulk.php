<?php
namespace Nemundo\Content\App\Dashboard\Data\UserDashboard;
class UserDashboardBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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