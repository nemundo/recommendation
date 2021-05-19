<?php
namespace Nemundo\Content\App\Store\Data\NumberStore;
class NumberStoreCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var NumberStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NumberStoreModel();
}
}