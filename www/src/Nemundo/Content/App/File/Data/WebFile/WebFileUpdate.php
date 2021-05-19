<?php
namespace Nemundo\Content\App\File\Data\WebFile;
use Nemundo\Model\Data\AbstractModelUpdate;
class WebFileUpdate extends AbstractModelUpdate {
/**
* @var WebFileModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
$this->file = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->file, $this->typeValueList);
}
public function update() {
parent::update();
}
}