<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FeedbackModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contact = $this->getModelValue($model->contact);
$this->email = $this->getModelValue($model->email);
$this->message = $this->getModelValue($model->message);
}
}