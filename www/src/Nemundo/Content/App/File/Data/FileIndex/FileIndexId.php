<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class FileIndexId extends AbstractModelIdValue {
/**
* @var FileIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileIndexModel();
}
}