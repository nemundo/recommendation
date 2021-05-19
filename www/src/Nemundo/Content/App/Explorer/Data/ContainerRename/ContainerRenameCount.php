<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContainerRenameModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerRenameModel();
}
}