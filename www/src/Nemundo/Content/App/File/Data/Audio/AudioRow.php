<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AudioModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Model\Reader\Property\File\FileReaderProperty
*/
public $audio;

/**
* @var int
*/
public $length;

/**
* @var string
*/
public $orginalFilename;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->audio = new \Nemundo\Model\Reader\Property\File\FileReaderProperty($row, $model->audio);
$this->length = intval($this->getModelValue($model->length));
$this->orginalFilename = $this->getModelValue($model->orginalFilename);
}
}