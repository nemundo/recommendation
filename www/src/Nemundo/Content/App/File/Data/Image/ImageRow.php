<?php
namespace Nemundo\Content\App\File\Data\Image;
class ImageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
*/
public $image;

/**
* @var string
*/
public $fileExtension;

/**
* @var int
*/
public $imageWidth;

/**
* @var int
*/
public $imageHeight;

/**
* @var int
*/
public $fileSize;

/**
* @var string
*/
public $orginalFilename;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->image = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->image);
$this->fileExtension = $this->getModelValue($model->fileExtension);
$this->imageWidth = intval($this->getModelValue($model->imageWidth));
$this->imageHeight = intval($this->getModelValue($model->imageHeight));
$this->fileSize = intval($this->getModelValue($model->fileSize));
$this->orginalFilename = $this->getModelValue($model->orginalFilename);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
}