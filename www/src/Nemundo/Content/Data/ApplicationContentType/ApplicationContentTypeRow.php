<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ApplicationContentTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Row\ApplicationCustomRow
*/
public $application;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $contentType;

/**
* @var bool
*/
public $setupStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->applicationId = $this->getModelValue($model->applicationId);
if ($model->application !== null) {
$this->loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model->application);
}
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
private function loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model) {
$this->application = new \Nemundo\App\Application\Row\ApplicationCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}