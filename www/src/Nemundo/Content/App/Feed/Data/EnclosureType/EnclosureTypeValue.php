<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var EnclosureTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
}