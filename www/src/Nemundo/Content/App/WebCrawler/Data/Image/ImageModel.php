<?php
namespace Nemundo\Content\App\WebCrawler\Data\Image;
class ImageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $urlId;

/**
* @var \Nemundo\Content\App\WebCrawler\Data\Url\UrlExternalType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

protected function loadModel() {
$this->tableName = "webcrawler_image";
$this->aliasTableName = "webcrawler_image";
$this->label = "Image";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcrawler_image";
$this->id->externalTableName = "webcrawler_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcrawler_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->urlId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->urlId->tableName = "webcrawler_image";
$this->urlId->fieldName = "url";
$this->urlId->aliasFieldName = "webcrawler_image_url";
$this->urlId->label = "Url";
$this->urlId->allowNullValue = false;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "webcrawler_image";
$this->imageUrl->externalTableName = "webcrawler_image";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "webcrawler_image_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = false;
$this->imageUrl->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "image_url";
$index->addType($this->imageUrl);

}
public function loadUrl() {
if ($this->url == null) {
$this->url = new \Nemundo\Content\App\WebCrawler\Data\Url\UrlExternalType($this, "webcrawler_image_url");
$this->url->tableName = "webcrawler_image";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "webcrawler_image_url";
$this->url->label = "Url";
}
return $this;
}
}