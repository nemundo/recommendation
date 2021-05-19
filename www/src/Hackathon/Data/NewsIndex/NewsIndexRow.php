<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var NewsIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $url;

/**
* @var int
*/
public $sourceId;

/**
* @var \Hackathon\Data\SourceIndex\SourceIndexRow
*/
public $source;

/**
* @var int
*/
public $newsTypeId;

/**
* @var \Hackathon\Data\NewsType\NewsTypeRow
*/
public $newsType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->title = $this->getModelValue($model->title);
$this->description = $this->getModelValue($model->description);
$this->url = $this->getModelValue($model->url);
$this->sourceId = intval($this->getModelValue($model->sourceId));
if ($model->source !== null) {
$this->loadHackathonDataSourceIndexSourceIndexsourceRow($model->source);
}
$this->newsTypeId = intval($this->getModelValue($model->newsTypeId));
if ($model->newsType !== null) {
$this->loadHackathonDataNewsTypeNewsTypenewsTypeRow($model->newsType);
}
}
private function loadHackathonDataSourceIndexSourceIndexsourceRow($model) {
$this->source = new \Hackathon\Data\SourceIndex\SourceIndexRow($this->row, $model);
}
private function loadHackathonDataNewsTypeNewsTypenewsTypeRow($model) {
$this->newsType = new \Hackathon\Data\NewsType\NewsTypeRow($this->row, $model);
}
}