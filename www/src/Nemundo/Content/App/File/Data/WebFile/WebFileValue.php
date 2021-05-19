<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFileValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
}
}