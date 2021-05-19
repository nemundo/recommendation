<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ContentTypeCollectionContentTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->collectionId, $this->collectionId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}