<?php
namespace Nemundo\Content\App\Explorer\Data\Container;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContainerId extends AbstractModelIdValue {
/**
* @var ContainerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerModel();
}
}