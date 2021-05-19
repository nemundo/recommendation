<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LogTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $logType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->logType = $this->getModelValue($model->logType);
}
}