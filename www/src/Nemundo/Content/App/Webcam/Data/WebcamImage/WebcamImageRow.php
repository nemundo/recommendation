<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebcamImageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $webcamId;

/**
* @var \Nemundo\Content\App\Webcam\Row\WebcamCustomRow
*/
public $webcam;

/**
* @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
*/
public $image;

/**
* @var string
*/
public $hash;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->webcamId = intval($this->getModelValue($model->webcamId));
if ($model->webcam !== null) {
$this->loadNemundoContentAppWebcamDataWebcamWebcamwebcamRow($model->webcam);
}
$this->image = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->image);
$this->hash = $this->getModelValue($model->hash);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
private function loadNemundoContentAppWebcamDataWebcamWebcamwebcamRow($model) {
$this->webcam = new \Nemundo\Content\App\Webcam\Row\WebcamCustomRow($this->row, $model);
}
}