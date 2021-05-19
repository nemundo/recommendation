<?php
namespace Nemundo\Content\App\File\Data\Document;
class DocumentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var DocumentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DocumentModel();
}
}