<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContactIndexId extends AbstractModelIdValue {
/**
* @var ContactIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContactIndexModel();
}
}