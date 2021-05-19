<?php
namespace Nemundo\App\Help\Data\Topic;
use Nemundo\Model\Id\AbstractModelIdValue;
class TopicId extends AbstractModelIdValue {
/**
* @var TopicModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
}