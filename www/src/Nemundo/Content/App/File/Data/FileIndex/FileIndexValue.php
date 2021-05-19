<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FileIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileIndexModel();
}
}