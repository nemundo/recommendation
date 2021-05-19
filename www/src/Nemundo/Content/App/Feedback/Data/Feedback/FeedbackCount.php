<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FeedbackModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeedbackModel();
}
}