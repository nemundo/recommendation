<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
use Nemundo\Model\Data\AbstractModelUpdate;
class ShowWidgetUpdate extends AbstractModelUpdate {
/**
* @var ShowWidgetModel
*/
public $model;

/**
* @var string
*/
public $showId;

/**
* @var int
*/
public $showLimit;

public function __construct() {
parent::__construct();
$this->model = new ShowWidgetModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->showId, $this->showId);
$this->typeValueList->setModelValue($this->model->showLimit, $this->showLimit);
parent::update();
}
}