<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RouteModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $route;

/**
* @var \Nemundo\Model\Reader\Property\File\FileReaderProperty
*/
public $gpxFile;

/**
* @var string
*/
public $color;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->route = $this->getModelValue($model->route);
$this->gpxFile = new \Nemundo\Model\Reader\Property\File\FileReaderProperty($row, $model->gpxFile);
$this->color = $this->getModelValue($model->color);
}
}