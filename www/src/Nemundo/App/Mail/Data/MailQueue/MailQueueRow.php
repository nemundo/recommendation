<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueueRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MailQueueModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var bool
*/
public $send;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeSend;

/**
* @var string
*/
public $mailTo;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $text;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeCreated;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->send = boolval($this->getModelValue($model->send));
$this->dateTimeSend = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeSend));
$this->mailTo = $this->getModelValue($model->mailTo);
$this->subject = $this->getModelValue($model->subject);
$this->text = $this->getModelValue($model->text);
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
}
}