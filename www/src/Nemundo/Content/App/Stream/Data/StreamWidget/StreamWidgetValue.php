<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidgetValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StreamWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamWidgetModel();
}
}