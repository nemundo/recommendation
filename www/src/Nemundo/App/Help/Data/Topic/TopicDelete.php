<?php
namespace Nemundo\App\Help\Data\Topic;
class TopicDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TopicModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
}