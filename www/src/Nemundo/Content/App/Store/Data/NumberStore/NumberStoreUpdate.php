<?php
namespace Nemundo\Content\App\Store\Data\NumberStore;
use Nemundo\Model\Data\AbstractModelUpdate;
class NumberStoreUpdate extends AbstractModelUpdate {
/**
* @var NumberStoreModel
*/
public $model;

/**
* @var int
*/
public $number;

public function __construct() {
parent::__construct();
$this->model = new NumberStoreModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->number, $this->number);
parent::update();
}
}