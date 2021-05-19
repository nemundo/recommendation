<?php
namespace Nemundo\Content\Data\IndexType;
use Nemundo\Model\Id\AbstractModelIdValue;
class IndexTypeId extends AbstractModelIdValue {
/**
* @var IndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
}