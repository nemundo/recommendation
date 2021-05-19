<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FileTransferModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
}