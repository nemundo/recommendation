<?php
namespace Nemundo\Content\App\FileTransfer\Data\File;
class FileBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FileModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->fileTransferId, $this->fileTransferId);
$id = parent::save();
return $id;
}
}