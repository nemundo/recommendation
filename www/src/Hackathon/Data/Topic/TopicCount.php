<?php
namespace Hackathon\Data\Topic;
class TopicCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TopicModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
}