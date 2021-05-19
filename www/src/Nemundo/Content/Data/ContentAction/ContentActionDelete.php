<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
}