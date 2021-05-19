<?php
namespace Nemundo\Content\App\Store\Data\NumberStore;
class NumberStoreValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var NumberStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NumberStoreModel();
}
}