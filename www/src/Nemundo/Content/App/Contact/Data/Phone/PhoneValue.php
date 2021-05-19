<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhoneValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PhoneModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
}