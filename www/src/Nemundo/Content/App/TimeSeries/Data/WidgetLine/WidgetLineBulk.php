<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WidgetLineModel
*/
protected $model;

/**
* @var string
*/
public $lineId;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->lineId, $this->lineId);
$id = parent::save();
return $id;
}
}