<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
class ContactIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContactIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var string
*/
public $company;

/**
* @var string
*/
public $lastName;

/**
* @var string
*/
public $firstName;

/**
* @var string
*/
public $phone;

/**
* @var string
*/
public $email;

/**
* @var int
*/
public $sourceId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $source;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->company = $this->getModelValue($model->company);
$this->lastName = $this->getModelValue($model->lastName);
$this->firstName = $this->getModelValue($model->firstName);
$this->phone = $this->getModelValue($model->phone);
$this->email = $this->getModelValue($model->email);
$this->sourceId = intval($this->getModelValue($model->sourceId));
if ($model->source !== null) {
$this->loadNemundoContentDataContentContentsourceRow($model->source);
}
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentContentsourceRow($model) {
$this->source = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}