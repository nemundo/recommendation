<?php
namespace Nemundo\Content\App\File\Data\Image;
class ImageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
}
}