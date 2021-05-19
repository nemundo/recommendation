<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
}