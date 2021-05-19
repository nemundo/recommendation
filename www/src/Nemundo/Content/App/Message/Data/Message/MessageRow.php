<?php
namespace Nemundo\Content\App\Message\Data\Message;
class MessageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MessageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $toId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $to;

/**
* @var string
*/
public $message;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->toId = $this->getModelValue($model->toId);
if ($model->to !== null) {
$this->loadNemundoUserDataUserUsertoRow($model->to);
}
$this->message = $this->getModelValue($model->message);
}
private function loadNemundoUserDataUserUsertoRow($model) {
$this->to = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}