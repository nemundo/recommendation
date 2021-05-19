<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFileRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebFileModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Model\Reader\Property\File\FileReaderProperty
*/
public $file;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->file = new \Nemundo\Model\Reader\Property\File\FileReaderProperty($row, $model->file);
}
}