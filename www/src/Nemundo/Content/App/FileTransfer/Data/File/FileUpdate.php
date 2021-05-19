<?php
namespace Nemundo\Content\App\FileTransfer\Data\File;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileUpdate extends AbstractModelUpdate {
/**
* @var FileModel
*/
public $model;

/**
* @var string
*/
public $fileTransferId;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
$this->file = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->fileTransferId, $this->fileTransferId);
parent::update();
}
}