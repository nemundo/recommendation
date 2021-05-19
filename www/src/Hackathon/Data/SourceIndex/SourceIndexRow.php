<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SourceIndexModel
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
public $uniqueUrl;

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
$this->source = $this->getModelValue($model->source);
$this->uniqueUrl = $this->getModelValue($model->uniqueUrl);
$this->newsTypeId = intval($this->getModelValue($model->newsTypeId));
if ($model->newsType !== null) {
$this->loadHackathonDataNewsTypeNewsTypenewsTypeRow($model->newsType);
}
}
private function loadHackathonDataNewsTypeNewsTypenewsTypeRow($model) {
$this->newsType = new \Hackathon\Data\NewsType\NewsTypeRow($this->row, $model);
}
}