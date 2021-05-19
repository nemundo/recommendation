<?php
namespace Nemundo\Content\App\Explorer\Data\Container;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContainerUpdate extends AbstractModelUpdate {
/**
* @var ContainerModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->container, $this->container);
parent::update();
}
}