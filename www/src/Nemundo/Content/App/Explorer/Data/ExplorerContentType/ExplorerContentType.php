<?php
namespace Nemundo\Content\App\Explorer\Data\ExplorerContentType;
class ExplorerContentType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ExplorerContentTypeModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ExplorerContentTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}