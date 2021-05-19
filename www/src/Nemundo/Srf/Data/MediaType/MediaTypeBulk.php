<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var MediaTypeModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $media;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->media, $this->media);
$id = parent::save();
return $id;
}
}