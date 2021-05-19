<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ContainerRenameModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->containerOld, $this->containerOld);
$this->typeValueList->setModelValue($this->model->containerNew, $this->containerNew);
$id = parent::save();
return $id;
}
}