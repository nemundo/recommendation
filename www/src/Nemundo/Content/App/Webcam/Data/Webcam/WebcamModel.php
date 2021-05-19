<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "webcam_webcam";
$this->aliasTableName = "webcam_webcam";
$this->label = "Webcam";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_webcam";
$this->id->externalTableName = "webcam_webcam";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_webcam_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->webcam = new \Nemundo\Model\Type\Text\TextType($this);
$this->webcam->tableName = "webcam_webcam";
$this->webcam->externalTableName = "webcam_webcam";
$this->webcam->fieldName = "webcam";
$this->webcam->aliasFieldName = "webcam_webcam_webcam";
$this->webcam->label = "Webcam";
$this->webcam->allowNullValue = false;
$this->webcam->length = 255;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "webcam_webcam";
$this->imageUrl->externalTableName = "webcam_webcam";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "webcam_webcam_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = false;
$this->imageUrl->length = 255;

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->sourceUrl->tableName = "webcam_webcam";
$this->sourceUrl->externalTableName = "webcam_webcam";
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->aliasFieldName = "webcam_webcam_source_url";
$this->sourceUrl->label = "Source Url";
$this->sourceUrl->allowNullValue = false;
$this->sourceUrl->length = 255;

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType($this);
$this->geoCoordinate->tableName = "webcam_webcam";
$this->geoCoordinate->externalTableName = "webcam_webcam";
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->aliasFieldName = "webcam_webcam_geo_coordinate";
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->allowNullValue = true;

$this->imageCrawler = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->imageCrawler->tableName = "webcam_webcam";
$this->imageCrawler->externalTableName = "webcam_webcam";
$this->imageCrawler->fieldName = "image_crawler";
$this->imageCrawler->aliasFieldName = "webcam_webcam_image_crawler";
$this->imageCrawler->label = "Image Crawler";
$this->imageCrawler->allowNullValue = false;

}
}