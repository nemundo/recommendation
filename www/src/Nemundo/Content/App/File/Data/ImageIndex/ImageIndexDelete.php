<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
class ImageIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ImageIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageIndexModel();
}
}