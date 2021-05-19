<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
}