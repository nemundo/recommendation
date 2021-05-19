<?php
namespace Hackathon\Data\Topic;
class TopicRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TopicModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $topic;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->topic = $this->getModelValue($model->topic);
}
}