<?php
namespace Nemundo\Content\Index\Tree\Data\Tree;
class TreeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TreeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeModel();
}
}