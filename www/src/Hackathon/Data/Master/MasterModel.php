<?php
namespace Hackathon\Data\Master;
class MasterModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

protected function loadModel() {
$this->tableName = "hackathon_master";
$this->aliasTableName = "hackathon_master";
$this->label = "Master";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_master";
$this->id->externalTableName = "hackathon_master";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_master_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "hackathon_master";
$this->subject->externalTableName = "hackathon_master";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "hackathon_master_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

}
}