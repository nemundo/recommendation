<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $logType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogTypeModel::class;
$this->externalTableName = "systemlog_log_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->logType = new \Nemundo\Model\Type\Text\TextType();
$this->logType->fieldName = "log_type";
$this->logType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logType->externalTableName = $this->externalTableName;
$this->logType->aliasFieldName = $this->logType->tableName . "_" . $this->logType->fieldName;
$this->logType->label = "Log Type";
$this->addType($this->logType);

}
}