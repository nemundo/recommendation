<?php
namespace Nemundo\Content\App\Explorer\Data\ExplorerContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class ExplorerContentTypeUpdate extends AbstractModelUpdate {
/**
* @var ExplorerContentTypeModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ExplorerContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}