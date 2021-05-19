<?php
namespace Nemundo\Content\Data\IndexType;
use Nemundo\Model\Data\AbstractModelUpdate;
class IndexTypeUpdate extends AbstractModelUpdate {
/**
* @var IndexTypeModel
*/
public $model;

/**
* @var string
*/
public $indexType;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->indexType, $this->indexType);
parent::update();
}
}