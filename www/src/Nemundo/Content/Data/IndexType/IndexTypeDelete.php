<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var IndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
}