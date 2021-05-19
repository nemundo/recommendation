<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContainerRenameUpdate extends AbstractModelUpdate {
/**
* @var ContainerRenameModel
*/
public $model;

/**
* @var string
*/
public $containerOld;

/**
* @var string
*/
public $containerNew;

public function __construct() {
parent::__construct();
$this->model = new ContainerRenameModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->containerOld, $this->containerOld);
$this->typeValueList->setModelValue($this->model->containerNew, $this->containerNew);
parent::update();
}
}