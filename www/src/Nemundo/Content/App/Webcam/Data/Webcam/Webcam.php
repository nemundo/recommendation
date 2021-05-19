<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class Webcam extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WebcamModel
*/
protected $model;

/**
* @var string
*/
public $webcam;

/**
* @var string
*/
public $imageUrl;

/**
* @var string
*/
public $sourceUrl;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinateAltitude
*/
public $geoCoordinate;

/**
* @var bool
*/
public $imageCrawler;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
}
public function save() {
$this->typeValueList->setModelValue($this->model->webcam, $this->webcam);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
$this->typeValueList->setModelValue($this->model->sourceUrl, $this->sourceUrl);
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateAltitudeDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
$this->typeValueList->setModelValue($this->model->imageCrawler, $this->imageCrawler);
$id = parent::save();
return $id;
}
}