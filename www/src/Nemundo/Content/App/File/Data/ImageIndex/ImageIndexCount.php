<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
class ImageIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ImageIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageIndexModel();
}
}