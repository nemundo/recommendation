<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RestrictedContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RestrictedContentTypeModel();
}
}