<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
class DashboardBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var DashboardModel
*/
protected $model;

/**
* @var string
*/
public $id;

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
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->dashboard, $this->dashboard);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$id = parent::save();
return $id;
}
}