<?php
namespace Nemundo\App\SystemLog\Data\Log;
class LogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Row\ApplicationCustomRow
*/
public $application;

/**
* @var string
*/
public $logTypeId;

/**
* @var \Nemundo\App\SystemLog\Data\LogType\LogTypeRow
*/
public $logType;

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
$this->applicationId = $this->getModelValue($model->applicationId);
if ($model->application !== null) {
$this->loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model->application);
}
$this->logTypeId = $this->getModelValue($model->logTypeId);
if ($model->logType !== null) {
$this->loadNemundoAppSystemLogDataLogTypeLogTypelogTypeRow($model->logType);
}
$this->message = $this->getModelValue($model->message);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
private function loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model) {
$this->application = new \Nemundo\App\Application\Row\ApplicationCustomRow($this->row, $model);
}
private function loadNemundoAppSystemLogDataLogTypeLogTypelogTypeRow($model) {
$this->logType = new \Nemundo\App\SystemLog\Data\LogType\LogTypeRow($this->row, $model);
}
}