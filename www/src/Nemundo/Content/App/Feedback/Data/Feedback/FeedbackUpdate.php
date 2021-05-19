<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
use Nemundo\Model\Data\AbstractModelUpdate;
class FeedbackUpdate extends AbstractModelUpdate {
/**
* @var FeedbackModel
*/
public $model;

/**
* @var string
*/
public $contact;

/**
* @var string
*/
public $email;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new FeedbackModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contact, $this->contact);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}