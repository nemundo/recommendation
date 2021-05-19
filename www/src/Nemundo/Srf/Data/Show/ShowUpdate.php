<?php
namespace Nemundo\Srf\Data\Show;
use Nemundo\Model\Data\AbstractModelUpdate;
class ShowUpdate extends AbstractModelUpdate {
/**
* @var ShowModel
*/
public $model;

/**
* @var string
*/
public $show;

/**
* @var string
*/
public $srfId;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $mediaTypeId;

public function __construct() {
parent::__construct();
$this->model = new ShowModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->show, $this->show);
$this->typeValueList->setModelValue($this->model->srfId, $this->srfId);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->mediaTypeId, $this->mediaTypeId);
parent::update();
}
}