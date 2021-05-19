<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
class ContactIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContactIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContactIndexModel();
}
}