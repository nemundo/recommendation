<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
use Nemundo\Model\Id\AbstractModelIdValue;
class ShowWidgetId extends AbstractModelIdValue {
/**
* @var ShowWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowWidgetModel();
}
}