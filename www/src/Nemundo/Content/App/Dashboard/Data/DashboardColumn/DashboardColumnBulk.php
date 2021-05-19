<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
class DashboardColumnBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var DashboardColumnModel
*/
protected $model;

/**
* @var int
*/
public $columnWidth;

public function __construct() {
parent::__construct();
$this->model = new DashboardColumnModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->columnWidth, $this->columnWidth);
$id = parent::save();
return $id;
}
}