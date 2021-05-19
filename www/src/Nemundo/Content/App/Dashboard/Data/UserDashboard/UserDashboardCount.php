<?php
namespace Nemundo\Content\App\Dashboard\Data\UserDashboard;
class UserDashboardCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserDashboardModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserDashboardModel();
}
}