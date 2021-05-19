<?php
namespace Nemundo\Content\App\WebCrawler\Data\Image;
class ImageExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageModel::class;
$this->externalTableName = "webcrawler_image";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->urlId = new \Nemundo\Model\Type\Id\IdType();
$this->urlId->fieldName = "url";
$this->urlId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->urlId->aliasFieldName = $this->urlId->tableName ."_".$this->urlId->fieldName;
$this->urlId->label = "Url";
$this->addType($this->urlId);

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType();
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageUrl->externalTableName = $this->externalTableName;
$this->imageUrl->aliasFieldName = $this->imageUrl->tableName . "_" . $this->imageUrl->fieldName;
$this->imageUrl->label = "Image Url";
$this->addType($this->imageUrl);

}
public function loadUrl() {
if ($this->url == null) {
$this->url = new \Nemundo\Content\App\WebCrawler\Data\Url\UrlExternalType(null, $this->parentFieldName . "_url");
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName ."_".$this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);
}
return $this;
}
}