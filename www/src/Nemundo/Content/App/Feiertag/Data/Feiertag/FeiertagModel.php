<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $datum;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $feiertag;

protected function loadModel() {
$this->tableName = "feiertag_feiertag";
$this->aliasTableName = "feiertag_feiertag";
$this->label = "Feiertag";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "feiertag_feiertag";
$this->id->externalTableName = "feiertag_feiertag";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "feiertag_feiertag_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->datum = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->datum->tableName = "feiertag_feiertag";
$this->datum->externalTableName = "feiertag_feiertag";
$this->datum->fieldName = "datum";
$this->datum->aliasFieldName = "feiertag_feiertag_datum";
$this->datum->label = "Datum";
$this->datum->allowNullValue = true;

$this->feiertag = new \Nemundo\Model\Type\Text\TextType($this);
$this->feiertag->tableName = "feiertag_feiertag";
$this->feiertag->externalTableName = "feiertag_feiertag";
$this->feiertag->fieldName = "feiertag";
$this->feiertag->aliasFieldName = "feiertag_feiertag_feiertag";
$this->feiertag->label = "Feiertag";
$this->feiertag->allowNullValue = true;
$this->feiertag->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "datum";
$index->addType($this->datum);

}
}