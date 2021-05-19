<?php
namespace Nemundo\Content\App\Explorer\Data\Container;
class ContainerValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContainerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerModel();
}
}