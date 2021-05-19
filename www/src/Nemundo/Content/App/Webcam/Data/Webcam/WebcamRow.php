<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebcamModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->webcam = $this->getModelValue($model->webcam);
$this->imageUrl = $this->getModelValue($model->imageUrl);
$this->sourceUrl = $this->getModelValue($model->sourceUrl);
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateAltitudeReaderProperty($row, $model->geoCoordinate);
$this->geoCoordinate = $property->getValue();
$this->imageCrawler = boolval($this->getModelValue($model->imageCrawler));
}
}