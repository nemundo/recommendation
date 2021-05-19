<?php
namespace Nemundo\Content\Index\Tree\Data\Tree;
use Nemundo\Model\Id\AbstractModelIdValue;
class TreeId extends AbstractModelIdValue {
/**
* @var TreeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeModel();
}
}