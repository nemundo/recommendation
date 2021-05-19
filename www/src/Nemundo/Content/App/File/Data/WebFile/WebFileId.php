<?php
namespace Nemundo\Content\App\File\Data\WebFile;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebFileId extends AbstractModelIdValue {
/**
* @var WebFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
}
}