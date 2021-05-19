<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContentTypeCollectionContentTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $collectionId;

/**
* @var \Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollectionRow
*/
public $collection;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $contentType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->collectionId = $this->getModelValue($model->collectionId);
if ($model->collection !== null) {
$this->loadNemundoContentDataContentTypeCollectionContentTypeCollectioncollectionRow($model->collection);
}
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
}
private function loadNemundoContentDataContentTypeCollectionContentTypeCollectioncollectionRow($model) {
$this->collection = new \Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollectionRow($this->row, $model);
}
private function loadNemundoContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}