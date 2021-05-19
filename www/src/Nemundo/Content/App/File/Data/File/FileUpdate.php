<?php
namespace Nemundo\Content\App\File\Data\File;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileUpdate extends AbstractModelUpdate {
/**
* @var FileModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
$this->file = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function update() {
parent::update();
}
}