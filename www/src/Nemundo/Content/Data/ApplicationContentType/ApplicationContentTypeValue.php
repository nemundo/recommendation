<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ApplicationContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationContentTypeModel();
}
}