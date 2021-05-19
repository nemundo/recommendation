<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
use Nemundo\Model\Data\AbstractModelUpdate;
class PhoneUpdate extends AbstractModelUpdate {
/**
* @var PhoneModel
*/
public $model;

/**
* @var string
*/
public $phone;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->phone, $this->phone);
parent::update();
}
}