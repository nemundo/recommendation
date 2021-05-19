<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhoneDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PhoneModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
}