<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
use Nemundo\Model\Data\AbstractModelUpdate;
class LayoutColumnUpdate extends AbstractModelUpdate {
/**
* @var LayoutColumnModel
*/
public $model;

/**
* @var int
*/
public $columnWidth;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->columnWidth, $this->columnWidth);
parent::update();
}
}