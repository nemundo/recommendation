<?php
namespace Nemundo\Content\App\File\Data\Document;
class Document extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var DocumentModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}