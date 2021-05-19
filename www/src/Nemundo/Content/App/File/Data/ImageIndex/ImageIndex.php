<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
class ImageIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ImageIndexModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}