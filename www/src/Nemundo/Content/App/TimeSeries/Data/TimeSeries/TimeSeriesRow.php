<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeriesRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TimeSeriesModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $timeSeries;

/**
* @var string
*/
public $uniqueName;

/**
* @var string
*/
public $source;

/**
* @var string
*/
public $sourceUrl;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $lastUpdate;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->timeSeries = $this->getModelValue($model->timeSeries);
$this->uniqueName = $this->getModelValue($model->uniqueName);
$this->source = $this->getModelValue($model->source);
$this->sourceUrl = $this->getModelValue($model->sourceUrl);
$this->lastUpdate = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->lastUpdate));
}
}