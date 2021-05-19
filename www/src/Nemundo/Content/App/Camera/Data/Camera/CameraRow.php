<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CameraModel
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
public $camera;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $width;

/**
* @var int
*/
public $height;

/**
* @var int
*/
public $filesize;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var int
*/
public $year;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->image = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->image);
$this->camera = $this->getModelValue($model->camera);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->width = intval($this->getModelValue($model->width));
$this->height = intval($this->getModelValue($model->height));
$this->filesize = intval($this->getModelValue($model->filesize));
$value = $this->getModelValue($model->date);
if ($value !== "0000-00-00") {
$this->date = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->date));
}
$this->year = intval($this->getModelValue($model->year));
}
}