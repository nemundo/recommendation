<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var IndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
}