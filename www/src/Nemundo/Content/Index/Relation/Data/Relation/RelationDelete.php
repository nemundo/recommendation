<?php
namespace Nemundo\Content\Index\Relation\Data\Relation;
class RelationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RelationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RelationModel();
}
}