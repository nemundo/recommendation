<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SystemLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $message;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->message = $this->getModelValue($model->message);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
}