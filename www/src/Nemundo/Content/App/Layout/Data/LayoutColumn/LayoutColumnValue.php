<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LayoutColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
}