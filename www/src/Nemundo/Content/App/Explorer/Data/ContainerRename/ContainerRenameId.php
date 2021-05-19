<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContainerRenameId extends AbstractModelIdValue {
/**
* @var ContainerRenameModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContainerRenameModel();
}
}