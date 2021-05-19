<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RestrictedContentTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $contentType;

/**
* @var string
*/
public $restrictedContentTypeId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $restrictedContentType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->restrictedContentTypeId = $this->getModelValue($model->restrictedContentTypeId);
if ($model->restrictedContentType !== null) {
$this->loadNemundoContentDataContentTypeContentTyperestrictedContentTypeRow($model->restrictedContentType);
}
}
private function loadNemundoContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentTypeContentTyperestrictedContentTypeRow($model) {
$this->restrictedContentType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}