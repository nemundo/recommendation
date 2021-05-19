<?php
namespace Hackathon\Data\Topic;
use Nemundo\Model\Data\AbstractModelUpdate;
class TopicUpdate extends AbstractModelUpdate {
/**
* @var TopicModel
*/
public $model;

/**
* @var string
*/
public $topic;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->topic, $this->topic);
parent::update();
}
}