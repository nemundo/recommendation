<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FileIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileIndexModel();
}
}