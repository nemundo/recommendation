<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "cms_livestream_cms";
$this->aliasTableName = "cms_livestream_cms";
$this->label = "Livestream Cms";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "cms_livestream_cms";
$this->id->externalTableName = "cms_livestream_cms";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "cms_livestream_cms_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;


}
}