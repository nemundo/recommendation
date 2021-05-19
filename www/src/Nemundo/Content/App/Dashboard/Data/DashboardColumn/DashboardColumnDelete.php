<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
class DashboardColumnDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var DashboardColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardColumnModel();
}
}