<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
use Nemundo\Model\Id\AbstractModelIdValue;
class StreamWidgetId extends AbstractModelIdValue {
/**
* @var StreamWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamWidgetModel();
}
}