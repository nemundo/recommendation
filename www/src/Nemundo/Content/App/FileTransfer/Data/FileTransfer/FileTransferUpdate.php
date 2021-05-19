<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileTransferUpdate extends AbstractModelUpdate {
/**
* @var FileTransferModel
*/
public $model;

/**
* @var string
*/
public $fileTransfer;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->fileTransfer, $this->fileTransfer);
parent::update();
}
}