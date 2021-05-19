<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
use Nemundo\Model\Id\AbstractModelIdValue;
class DashboardColumnId extends AbstractModelIdValue {
/**
* @var DashboardColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardColumnModel();
}
}