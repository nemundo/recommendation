<?php
namespace Nemundo\Content\Data\ViewContentType;
class ViewContentTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ViewContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
}