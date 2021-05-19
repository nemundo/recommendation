<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var EnclosureTypeModel
*/
protected $model;

/**
* @var string
*/
public $eenclosureType;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->eenclosureType, $this->eenclosureType);
$id = parent::save();
return $id;
}
}