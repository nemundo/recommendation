<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContainerRenameModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerRenameModel();
}
}