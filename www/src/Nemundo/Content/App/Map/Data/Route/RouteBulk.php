<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var RouteModel
*/
protected $model;

/**
* @var string
*/
public $route;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $gpxFile;

/**
* @var string
*/
public $color;

public function __construct() {
parent::__construct();
$this->model = new RouteModel();
$this->gpxFile = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->gpxFile, $this->typeValueList);
}
public function save() {
$this->typeValueList->setModelValue($this->model->route, $this->route);
$this->typeValueList->setModelValue($this->model->color, $this->color);
$id = parent::save();
return $id;
}
}