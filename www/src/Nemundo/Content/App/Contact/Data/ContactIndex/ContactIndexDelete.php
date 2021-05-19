<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
class ContactIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContactIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContactIndexModel();
}
}