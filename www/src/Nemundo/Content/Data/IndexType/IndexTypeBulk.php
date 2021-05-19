<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var IndexTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $indexType;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->indexType, $this->indexType);
$id = parent::save();
return $id;
}
}