<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidgetDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StreamWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamWidgetModel();
}
}