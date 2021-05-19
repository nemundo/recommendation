<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ShowWidgetModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->showId, $this->showId);
$this->typeValueList->setModelValue($this->model->showLimit, $this->showLimit);
$id = parent::save();
return $id;
}
}