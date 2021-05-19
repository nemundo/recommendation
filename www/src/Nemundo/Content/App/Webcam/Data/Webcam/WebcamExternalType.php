<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $webcam;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sourceUrl;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType
*/
public $geoCoordinate;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $imageCrawler;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WebcamModel::class;
$this->externalTableName = "webcam_webcam";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->webcam = new \Nemundo\Model\Type\Text\TextType();
$this->webcam->fieldName = "webcam";
$this->webcam->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->webcam->externalTableName = $this->externalTableName;
$this->webcam->aliasFieldName = $this->webcam->tableName . "_" . $this->webcam->fieldName;
$this->webcam->label = "Webcam";
$this->addType($this->webcam);

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType();
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageUrl->externalTableName = $this->externalTableName;
$this->imageUrl->aliasFieldName = $this->imageUrl->tableName . "_" . $this->imageUrl->fieldName;
$this->imageUrl->label = "Image Url";
$this->addType($this->imageUrl);

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType();
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceUrl->externalTableName = $this->externalTableName;
$this->sourceUrl->aliasFieldName = $this->sourceUrl->tableName . "_" . $this->sourceUrl->fieldName;
$this->sourceUrl->label = "Source Url";
$this->addType($this->sourceUrl);

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType();
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->geoCoordinate->externalTableName = $this->externalTableName;
$this->geoCoordinate->aliasFieldName = $this->geoCoordinate->tableName . "_" . $this->geoCoordinate->fieldName;
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->createObject();
$this->addType($this->geoCoordinate);

$this->imageCrawler = new \Nemundo\Model\Type\Number\YesNoType();
$this->imageCrawler->fieldName = "image_crawler";
$this->imageCrawler->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageCrawler->externalTableName = $this->externalTableName;
$this->imageCrawler->aliasFieldName = $this->imageCrawler->tableName . "_" . $this->imageCrawler->fieldName;
$this->imageCrawler->label = "Image Crawler";
$this->addType($this->imageCrawler);

}
}