<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumn extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LayoutColumnModel
*/
protected $model;

/**
* @var int
*/
public $columnWidth;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->columnWidth, $this->columnWidth);
$id = parent::save();
return $id;
}
}