<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
use Nemundo\Model\Id\AbstractModelIdValue;
class PhoneId extends AbstractModelIdValue {
/**
* @var PhoneModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
}