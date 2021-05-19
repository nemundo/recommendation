<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContainerRenameModel::class;
$this->externalTableName = "explorer_container_rename";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->containerOld = new \Nemundo\Model\Type\Text\TextType();
$this->containerOld->fieldName = "container_old";
$this->containerOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->containerOld->externalTableName = $this->externalTableName;
$this->containerOld->aliasFieldName = $this->containerOld->tableName . "_" . $this->containerOld->fieldName;
$this->containerOld->label = "Container Old";
$this->addType($this->containerOld);

$this->containerNew = new \Nemundo\Model\Type\Text\TextType();
$this->containerNew->fieldName = "container_new";
$this->containerNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->containerNew->externalTableName = $this->externalTableName;
$this->containerNew->aliasFieldName = $this->containerNew->tableName . "_" . $this->containerNew->fieldName;
$this->containerNew->label = "Container New";
$this->addType($this->containerNew);

}
}