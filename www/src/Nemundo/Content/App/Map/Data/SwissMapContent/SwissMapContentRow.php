<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SwissMapContentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty($row, $model->geoCoordinate);
$this->geoCoordinate = $property->getValue();
}
}