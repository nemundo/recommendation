<?php
namespace Nemundo\Content\Data\ContentView;
class ContentView extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ContentViewModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $viewName;

/**
* @var string
*/
public $viewClass;

/**
* @var bool
*/
public $setupStatus;

/**
* @var bool
*/
public $defaultView;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->viewName, $this->viewName);
$this->typeValueList->setModelValue($this->model->viewClass, $this->viewClass);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$this->typeValueList->setModelValue($this->model->defaultView, $this->defaultView);
$id = parent::save();
return $id;
}
}