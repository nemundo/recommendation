<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FeedbackModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contact, $this->contact);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}