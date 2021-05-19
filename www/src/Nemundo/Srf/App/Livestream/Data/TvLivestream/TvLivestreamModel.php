<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "livestream_tv_livestream";
$this->aliasTableName = "livestream_tv_livestream";
$this->label = "Tv Livestream";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "livestream_tv_livestream";
$this->id->externalTableName = "livestream_tv_livestream";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "livestream_tv_livestream_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

}
}