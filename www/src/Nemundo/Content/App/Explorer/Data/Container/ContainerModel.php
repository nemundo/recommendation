<?php
namespace Nemundo\Content\App\Explorer\Data\Container;
class ContainerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $iconAutoSize200;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $container;

protected function loadModel() {
$this->tableName = "explorer_container";
$this->aliasTableName = "explorer_container";
$this->label = "Container";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "explorer_container";
$this->id->externalTableName = "explorer_container";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "explorer_container_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "explorer_container";
$this->description->externalTableName = "explorer_container";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "explorer_container_description";
$this->description->label = "Description";
$this->description->allowNullValue = true;

$this->icon = new \Nemundo\Model\Type\File\ImageType($this);
$this->icon->tableName = "explorer_container";
$this->icon->externalTableName = "explorer_container";
$this->icon->fieldName = "icon";
$this->icon->aliasFieldName = "explorer_container_icon";
$this->icon->label = "Icon";
$this->icon->allowNullValue = true;
$this->iconAutoSize200 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->icon);
$this->iconAutoSize200->size = 200;

$this->container = new \Nemundo\Model\Type\Text\TextType($this);
$this->container->tableName = "explorer_container";
$this->container->externalTableName = "explorer_container";
$this->container->fieldName = "container";
$this->container->aliasFieldName = "explorer_container_container";
$this->container->label = "Container";
$this->container->allowNullValue = true;
$this->container->length = 255;

}
}