<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var IndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
}