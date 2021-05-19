<?php
namespace Nemundo\Content\App\FileTransfer\Data\File;
class FileCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
}