<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
class SourceRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SourceModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $source;

/**
* @var string
*/
public $url;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->source = $this->getModelValue($model->source);
$this->url = $this->getModelValue($model->url);
}
}