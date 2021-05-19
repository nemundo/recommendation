<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LayoutColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
}