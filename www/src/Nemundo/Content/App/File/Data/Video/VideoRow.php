<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var VideoModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Model\Reader\Property\File\FileReaderProperty
*/
public $video;

/**
* @var string
*/
public $orginalFilename;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->video = new \Nemundo\Model\Reader\Property\File\FileReaderProperty($row, $model->video);
$this->orginalFilename = $this->getModelValue($model->orginalFilename);
}
}