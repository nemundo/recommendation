<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContentViewModel
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
public $viewName;

/**
* @var string
*/
public $viewClass;

/**
* @var bool
*/
public $setupStatus;

/**
* @var bool
*/
public $defaultView;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->viewName = $this->getModelValue($model->viewName);
$this->viewClass = $this->getModelValue($model->viewClass);
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
$this->defaultView = boolval($this->getModelValue($model->defaultView));
}
private function loadNemundoContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}