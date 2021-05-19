<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollection extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ContentTypeCollectionModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $collection;

/**
* @var string
*/
public $phpClass;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->collection, $this->collection);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$id = parent::save();
return $id;
}
}