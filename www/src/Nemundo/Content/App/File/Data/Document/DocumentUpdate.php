<?php
namespace Nemundo\Content\App\File\Data\Document;
use Nemundo\Model\Data\AbstractModelUpdate;
class DocumentUpdate extends AbstractModelUpdate {
/**
* @var DocumentModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $document;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new DocumentModel();
$this->document = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->document, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}