<?php
namespace Nemundo\Content\Index\Tree\Data\Tree;
class TreeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TreeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeModel();
}
}