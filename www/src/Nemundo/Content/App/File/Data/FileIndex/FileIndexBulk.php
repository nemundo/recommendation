<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FileIndexModel
*/
protected $model;

/**
* @var string
*/
public $parentId;

/**
* @var string
*/
public $fileId;

public function __construct() {
parent::__construct();
$this->model = new FileIndexModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$id = parent::save();
return $id;
}
}