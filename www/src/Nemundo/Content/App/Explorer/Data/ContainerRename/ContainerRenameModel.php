<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $containerOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $containerNew;

protected function loadModel() {
$this->tableName = "explorer_container_rename";
$this->aliasTableName = "explorer_container_rename";
$this->label = "Container Rename";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "explorer_container_rename";
$this->id->externalTableName = "explorer_container_rename";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "explorer_container_rename_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->containerOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->containerOld->tableName = "explorer_container_rename";
$this->containerOld->externalTableName = "explorer_container_rename";
$this->containerOld->fieldName = "container_old";
$this->containerOld->aliasFieldName = "explorer_container_rename_container_old";
$this->containerOld->label = "Container Old";
$this->containerOld->allowNullValue = true;
$this->containerOld->length = 255;

$this->containerNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->containerNew->tableName = "explorer_container_rename";
$this->containerNew->externalTableName = "explorer_container_rename";
$this->containerNew->fieldName = "container_new";
$this->containerNew->aliasFieldName = "explorer_container_rename_container_new";
$this->containerNew->label = "Container New";
$this->containerNew->allowNullValue = true;
$this->containerNew->length = 255;

}
}