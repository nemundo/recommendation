<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGalleryRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageGalleryModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $imageGallery;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->imageGallery = $this->getModelValue($model->imageGallery);
}
}