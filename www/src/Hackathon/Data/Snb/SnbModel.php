<?php
namespace Hackathon\Data\Snb;
class SnbModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $month;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $year;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $devisen;

protected function loadModel() {
$this->tableName = "hackathon_snb";
$this->aliasTableName = "hackathon_snb";
$this->label = "Snb";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_snb";
$this->id->externalTableName = "hackathon_snb";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_snb_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->month = new \Nemundo\Model\Type\Number\NumberType($this);
$this->month->tableName = "hackathon_snb";
$this->month->externalTableName = "hackathon_snb";
$this->month->fieldName = "month";
$this->month->aliasFieldName = "hackathon_snb_month";
$this->month->label = "Month";
$this->month->allowNullValue = false;

$this->year = new \Nemundo\Model\Type\Number\NumberType($this);
$this->year->tableName = "hackathon_snb";
$this->year->externalTableName = "hackathon_snb";
$this->year->fieldName = "year";
$this->year->aliasFieldName = "hackathon_snb_year";
$this->year->label = "Year";
$this->year->allowNullValue = false;

$this->devisen = new \Nemundo\Model\Type\Number\NumberType($this);
$this->devisen->tableName = "hackathon_snb";
$this->devisen->externalTableName = "hackathon_snb";
$this->devisen->fieldName = "devisen";
$this->devisen->aliasFieldName = "hackathon_snb_devisen";
$this->devisen->label = "Devisen";
$this->devisen->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "month_year";
$index->addType($this->month);
$index->addType($this->year);

}
}