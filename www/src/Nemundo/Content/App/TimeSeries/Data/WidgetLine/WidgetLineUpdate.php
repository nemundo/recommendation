<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
use Nemundo\Model\Data\AbstractModelUpdate;
class WidgetLineUpdate extends AbstractModelUpdate {
/**
* @var WidgetLineModel
*/
public $model;

/**
* @var string
*/
public $lineId;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->lineId, $this->lineId);
parent::update();
}
}