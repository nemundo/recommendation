<?php
namespace Nemundo\App\Help\Data\Topic;
class TopicValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TopicModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
}