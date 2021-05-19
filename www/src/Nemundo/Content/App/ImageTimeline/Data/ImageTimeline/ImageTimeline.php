<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimeline extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ImageTimelineModel
*/
protected $model;

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

public function __construct() {
parent::__construct();
$this->model = new ImageTimelineModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->timeline, $this->timeline);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->sourceUrl, $this->sourceUrl);
$this->typeValueList->setModelValue($this->model->crawling, $this->crawling);
$id = parent::save();
return $id;
}
}