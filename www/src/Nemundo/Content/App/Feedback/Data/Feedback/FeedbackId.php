<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
use Nemundo\Model\Id\AbstractModelIdValue;
class FeedbackId extends AbstractModelIdValue {
/**
* @var FeedbackModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeedbackModel();
}
}