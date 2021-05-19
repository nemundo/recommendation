<?php
namespace Nemundo\Srf\Data\Show;
class Show extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ShowModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->show, $this->show);
$this->typeValueList->setModelValue($this->model->srfId, $this->srfId);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->mediaTypeId, $this->mediaTypeId);
$id = parent::save();
return $id;
}
}