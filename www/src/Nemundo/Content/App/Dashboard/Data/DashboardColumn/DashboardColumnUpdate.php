<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
use Nemundo\Model\Data\AbstractModelUpdate;
class DashboardColumnUpdate extends AbstractModelUpdate {
/**
* @var DashboardColumnModel
*/
public $model;

/**
* @var int
*/
public $columnWidth;

public function __construct() {
parent::__construct();
$this->model = new DashboardColumnModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->columnWidth, $this->columnWidth);
parent::update();
}
}