<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentTypeCollectionUpdate extends AbstractModelUpdate {
/**
* @var ContentTypeCollectionModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->collection, $this->collection);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
parent::update();
}
}