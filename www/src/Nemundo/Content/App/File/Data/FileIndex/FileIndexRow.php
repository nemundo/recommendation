<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FileIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $parentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $parent;

/**
* @var int
*/
public $fileId;

/**
* @var \Nemundo\Content\App\File\Data\File\FileRow
*/
public $file;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->parentId = intval($this->getModelValue($model->parentId));
if ($model->parent !== null) {
$this->loadNemundoContentDataContentContentparentRow($model->parent);
}
$this->fileId = intval($this->getModelValue($model->fileId));
if ($model->file !== null) {
$this->loadNemundoContentAppFileDataFileFilefileRow($model->file);
}
}
private function loadNemundoContentDataContentContentparentRow($model) {
$this->parent = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentAppFileDataFileFilefileRow($model) {
$this->file = new \Nemundo\Content\App\File\Data\File\FileRow($this->row, $model);
}
}