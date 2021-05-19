<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageTimelineModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $timeline;

/**
* @var string
*/
public $imageUrl;

/**
* @var string
*/
public $source;

/**
* @var string
*/
public $sourceUrl;

/**
* @var bool
*/
public $crawling;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->timeline = $this->getModelValue($model->timeline);
$this->imageUrl = $this->getModelValue($model->imageUrl);
$this->source = $this->getModelValue($model->source);
$this->sourceUrl = $this->getModelValue($model->sourceUrl);
$this->crawling = boolval($this->getModelValue($model->crawling));
}
}