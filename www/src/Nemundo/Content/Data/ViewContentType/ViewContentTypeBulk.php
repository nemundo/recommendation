<?php
namespace Nemundo\Content\Data\ViewContentType;
class ViewContentTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ViewContentTypeModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}