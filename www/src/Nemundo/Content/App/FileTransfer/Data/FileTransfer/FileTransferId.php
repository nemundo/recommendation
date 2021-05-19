<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
use Nemundo\Model\Id\AbstractModelIdValue;
class FileTransferId extends AbstractModelIdValue {
/**
* @var FileTransferModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
}