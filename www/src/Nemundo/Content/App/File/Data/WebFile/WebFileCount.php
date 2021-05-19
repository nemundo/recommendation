<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFileCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
}
}