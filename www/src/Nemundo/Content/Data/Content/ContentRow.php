<?php
namespace Nemundo\Content\Data\Content;
class ContentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $subject;

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
$this->dataId = $this->getModelValue($model->dataId);
$this->subject = $this->getModelValue($model->subject);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
}
private function loadNemundoContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}