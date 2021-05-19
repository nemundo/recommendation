<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FileTransferModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
}