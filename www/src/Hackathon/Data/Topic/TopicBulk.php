<?php
namespace Hackathon\Data\Topic;
class TopicBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TopicModel
*/
protected $model;

/**
* @var string
*/
public $topic;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->topic, $this->topic);
$id = parent::save();
return $id;
}
}