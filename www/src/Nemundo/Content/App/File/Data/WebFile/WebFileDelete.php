<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFileDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
}
}