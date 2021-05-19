<?php
namespace Nemundo\Srf\Data\MediaType;
use Nemundo\Model\Data\AbstractModelUpdate;
class MediaTypeUpdate extends AbstractModelUpdate {
/**
* @var MediaTypeModel
*/
public $model;

/**
* @var string
*/
public $media;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->media, $this->media);
parent::update();
}
}