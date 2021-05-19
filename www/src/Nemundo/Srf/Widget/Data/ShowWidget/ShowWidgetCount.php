<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ShowWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowWidgetModel();
}
}