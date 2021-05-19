<?php
namespace Nemundo\Content\App\Explorer\Data\Container;
class Container extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ContainerModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $icon;

/**
* @var string
*/
public $container;

public function __construct() {
parent::__construct();
$this->model = new ContainerModel();
$this->icon = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->icon, $this->typeValueList);
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->container, $this->container);
$id = parent::save();
return $id;
}
}