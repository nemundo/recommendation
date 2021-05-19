<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransfer extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var FileTransferModel
*/
protected $model;

/**
* @var string
*/
public $fileTransfer;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->fileTransfer, $this->fileTransfer);
$id = parent::save();
return $id;
}
}