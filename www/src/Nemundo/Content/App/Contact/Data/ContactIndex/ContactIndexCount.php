<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
class ContactIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContactIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContactIndexModel();
}
}