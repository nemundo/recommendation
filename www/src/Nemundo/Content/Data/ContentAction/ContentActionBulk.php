<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ContentActionModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}