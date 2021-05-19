<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FeedbackModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeedbackModel();
}
}