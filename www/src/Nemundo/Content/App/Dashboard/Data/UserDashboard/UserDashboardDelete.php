<?php
namespace Nemundo\Content\App\Dashboard\Data\UserDashboard;
class UserDashboardDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserDashboardModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserDashboardModel();
}
}