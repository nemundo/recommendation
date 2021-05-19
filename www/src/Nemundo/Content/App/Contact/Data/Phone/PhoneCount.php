<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhoneCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PhoneModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
}