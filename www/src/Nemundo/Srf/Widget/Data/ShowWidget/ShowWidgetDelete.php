<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ShowWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowWidgetModel();
}
}