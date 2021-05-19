<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
class DashboardColumnCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DashboardColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardColumnModel();
}
}