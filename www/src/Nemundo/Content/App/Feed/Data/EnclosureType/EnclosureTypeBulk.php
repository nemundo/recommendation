<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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