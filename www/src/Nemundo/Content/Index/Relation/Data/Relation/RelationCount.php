<?php
namespace Nemundo\Content\Index\Relation\Data\Relation;
class RelationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RelationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RelationModel();
}
}