<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FeedbackModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeedbackModel();
}
}