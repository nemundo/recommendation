<?php
namespace Nemundo\Content\App\File\Data\File;
class File extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var FileModel
*/
protected $model;

/**
* @var \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
$this->file = new \Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function save() {
$id = parent::save();
return $id;
}
}