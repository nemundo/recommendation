<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageIndexUpdate extends AbstractModelUpdate {
/**
* @var ImageIndexModel
*/
public $model;

/**
* @var string
*/
public $contentId;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

public function __construct() {
parent::__construct();
$this->model = new ImageIndexModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}