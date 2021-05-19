<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LayoutColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
}