<?php
namespace Nemundo\Content\Index\Relation\Data\Relation;
class RelationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RelationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RelationModel();
}
}