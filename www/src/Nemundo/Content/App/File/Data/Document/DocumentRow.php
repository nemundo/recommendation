<?php
namespace Nemundo\Content\App\File\Data\Document;
class DocumentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var DocumentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty
*/
public $document;

/**
* @var string
*/
public $text;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->document = new \Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty($row, $model->document, $model->id);
$this->text = $this->getModelValue($model->text);
}
}