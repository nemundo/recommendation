<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileIndexUpdate extends AbstractModelUpdate {
/**
* @var FileIndexModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
parent::update();
}
}