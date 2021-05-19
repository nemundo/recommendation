<?php
namespace Nemundo\App\Help\Data\Topic;
class Topic extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TopicModel
*/
protected $model;

/**
* @var string
*/
public $projectId;

/**
* @var string
*/
public $topic;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->projectId, $this->projectId);
$this->typeValueList->setModelValue($this->model->topic, $this->topic);
$id = parent::save();
return $id;
}
}