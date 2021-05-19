<?php
namespace Nemundo\Content\App\Store\Data\NumberStore;
class NumberStoreDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var NumberStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NumberStoreModel();
}
}