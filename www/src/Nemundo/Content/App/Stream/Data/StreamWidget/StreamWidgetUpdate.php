<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
use Nemundo\Model\Data\AbstractModelUpdate;
class StreamWidgetUpdate extends AbstractModelUpdate {
/**
* @var StreamWidgetModel
*/
public $model;

/**
* @var int
*/
public $limit;

public function __construct() {
parent::__construct();
$this->model = new StreamWidgetModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->limit, $this->limit);
parent::update();
}
}