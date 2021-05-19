<?php
namespace Nemundo\App\Help\Data\Code;
class CodeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CodeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $topicId;

/**
* @var \Nemundo\App\Help\Data\Topic\TopicRow
*/
public $topic;

/**
* @var string
*/
public $code;

/**
* @var string
*/
public $title;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->topicId = intval($this->getModelValue($model->topicId));
if ($model->topic !== null) {
$this->loadNemundoAppHelpDataTopicTopictopicRow($model->topic);
}
$this->code = $this->getModelValue($model->code);
$this->title = $this->getModelValue($model->title);
}
private function loadNemundoAppHelpDataTopicTopictopicRow($model) {
$this->topic = new \Nemundo\App\Help\Data\Topic\TopicRow($this->row, $model);
}
}