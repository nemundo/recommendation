<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
use Nemundo\Model\Data\AbstractModelUpdate;
class EnclosureTypeUpdate extends AbstractModelUpdate {
/**
* @var EnclosureTypeModel
*/
public $model;

/**
* @var string
*/
public $eenclosureType;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->eenclosureType, $this->eenclosureType);
parent::update();
}
}