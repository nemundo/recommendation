<?php
namespace Nemundo\Content\Data\ContentAction;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentActionId extends AbstractModelIdValue {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
}