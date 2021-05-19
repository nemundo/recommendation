<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WidgetLineModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineRow
*/
public $line;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->lineId = intval($this->getModelValue($model->lineId));
if ($model->line !== null) {
$this->loadNemundoContentAppTimeSeriesDataLineLinelineRow($model->line);
}
}
private function loadNemundoContentAppTimeSeriesDataLineLinelineRow($model) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineRow($this->row, $model);
}
}