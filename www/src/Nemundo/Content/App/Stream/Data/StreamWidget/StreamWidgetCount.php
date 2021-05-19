<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidgetCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StreamWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamWidgetModel();
}
}