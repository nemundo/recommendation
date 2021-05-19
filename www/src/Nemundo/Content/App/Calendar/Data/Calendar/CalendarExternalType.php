<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class CalendarExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $date;

/**
* @var \Nemundo\Model\Type\DateTime\TimeType
*/
public $time;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $event;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CalendarModel::class;
$this->externalTableName = "calendar_calendar";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->date = new \Nemundo\Model\Type\DateTime\DateType();
$this->date->fieldName = "date";
$this->date->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->date->externalTableName = $this->externalTableName;
$this->date->aliasFieldName = $this->date->tableName . "_" . $this->date->fieldName;
$this->date->label = "Date";
$this->addType($this->date);

$this->time = new \Nemundo\Model\Type\DateTime\TimeType();
$this->time->fieldName = "time";
$this->time->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->time->externalTableName = $this->externalTableName;
$this->time->aliasFieldName = $this->time->tableName . "_" . $this->time->fieldName;
$this->time->label = "Time";
$this->addType($this->time);

$this->event = new \Nemundo\Model\Type\Text\TextType();
$this->event->fieldName = "event";
$this->event->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->event->externalTableName = $this->externalTableName;
$this->event->aliasFieldName = $this->event->tableName . "_" . $this->event->fieldName;
$this->event->label = "Event";
$this->addType($this->event);

}
}