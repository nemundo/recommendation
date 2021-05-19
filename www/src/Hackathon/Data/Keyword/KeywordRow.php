<?php
namespace Hackathon\Data\Keyword;
class KeywordRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KeywordModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $keyword;

/**
* @var int
*/
public $topicId;

/**
* @var \Hackathon\Data\Topic\TopicRow
*/
public $topic;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->keyword = $this->getModelValue($model->keyword);
$this->topicId = intval($this->getModelValue($model->topicId));
if ($model->topic !== null) {
$this->loadHackathonDataTopicTopictopicRow($model->topic);
}
}
private function loadHackathonDataTopicTopictopicRow($model) {
$this->topic = new \Hackathon\Data\Topic\TopicRow($this->row, $model);
}
}