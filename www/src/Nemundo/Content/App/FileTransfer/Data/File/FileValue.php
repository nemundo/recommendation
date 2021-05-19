<?php
namespace Nemundo\Content\App\FileTransfer\Data\File;
class FileValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
}