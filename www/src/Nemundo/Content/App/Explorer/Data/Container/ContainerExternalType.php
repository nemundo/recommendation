<?php
namespace Nemundo\Content\App\Explorer\Data\Container;
class ContainerExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $icon;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $container;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContainerModel::class;
$this->externalTableName = "explorer_container";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->icon = new \Nemundo\Model\Type\File\ImageType();
$this->icon->fieldName = "icon";
$this->icon->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->icon->externalTableName = $this->externalTableName;
$this->icon->aliasFieldName = $this->icon->tableName . "_" . $this->icon->fieldName;
$this->icon->label = "Icon";
$this->addType($this->icon);

$this->container = new \Nemundo\Model\Type\Text\TextType();
$this->container->fieldName = "container";
$this->container->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->container->externalTableName = $this->externalTableName;
$this->container->aliasFieldName = $this->container->tableName . "_" . $this->container->fieldName;
$this->container->label = "Container";
$this->addType($this->container);

}
}