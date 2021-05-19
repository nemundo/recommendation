<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentTypeCollectionContentTypeUpdate extends AbstractModelUpdate {
/**
* @var ContentTypeCollectionContentTypeModel
*/
public $model;

/**
* @var string
*/
public $collectionId;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionContentTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->collectionId, $this->collectionId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}