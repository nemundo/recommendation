<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FileTransferModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
}