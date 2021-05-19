<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
class ImageIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ImageIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageIndexModel();
}
}