<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContainerRenameModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerRenameModel();
}
}