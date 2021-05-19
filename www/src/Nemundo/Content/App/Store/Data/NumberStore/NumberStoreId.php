<?php
namespace Nemundo\Content\App\Store\Data\NumberStore;
use Nemundo\Model\Id\AbstractModelIdValue;
class NumberStoreId extends AbstractModelIdValue {
/**
* @var NumberStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NumberStoreModel();
}
}