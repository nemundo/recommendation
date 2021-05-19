<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
class DashboardModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $dashboard;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize300;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize1200;

protected function loadModel() {
$this->tableName = "dashboard_dashboard";
$this->aliasTableName = "dashboard_dashboard";
$this->label = "Dashboard";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dashboard_dashboard";
$this->id->externalTableName = "dashboard_dashboard";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dashboard_dashboard_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dashboard = new \Nemundo\Model\Type\Text\TextType($this);
$this->dashboard->tableName = "dashboard_dashboard";
$this->dashboard->externalTableName = "dashboard_dashboard";
$this->dashboard->fieldName = "dashboard";
$this->dashboard->aliasFieldName = "dashboard_dashboard_dashboard";
$this->dashboard->label = "Dashboard";
$this->dashboard->allowNullValue = false;
$this->dashboard->length = 255;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "dashboard_dashboard";
$this->url->externalTableName = "dashboard_dashboard";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "dashboard_dashboard_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "dashboard_dashboard";
$this->active->externalTableName = "dashboard_dashboard";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "dashboard_dashboard_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "dashboard_dashboard";
$this->description->externalTableName = "dashboard_dashboard";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "dashboard_dashboard_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "dashboard_dashboard";
$this->image->externalTableName = "dashboard_dashboard";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "dashboard_dashboard_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;
$this->imageAutoSize300 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize300->size = 300;
$this->imageAutoSize1200 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize1200->size = 1200;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "url";
$index->addType($this->url);

}
}