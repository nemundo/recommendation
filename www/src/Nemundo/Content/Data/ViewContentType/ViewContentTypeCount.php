<?php
namespace Nemundo\Content\Data\ViewContentType;
class ViewContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ViewContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
}