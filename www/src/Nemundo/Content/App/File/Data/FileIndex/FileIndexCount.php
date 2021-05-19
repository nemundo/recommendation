<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FileIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileIndexModel();
}
}