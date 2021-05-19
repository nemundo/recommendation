<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
use Nemundo\Model\Data\AbstractModelUpdate;
class DashboardUpdate extends AbstractModelUpdate {
/**
* @var DashboardModel
*/
public $model;

/**
* @var string
*/
public $dashboard;

/**
* @var string
*/
public $url;

/**
* @var bool
*/
public $active;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

public function __construct() {
parent::__construct();
$this->model = new DashboardModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->dashboard, $this->dashboard);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->description, $this->description);
parent::update();
}
}