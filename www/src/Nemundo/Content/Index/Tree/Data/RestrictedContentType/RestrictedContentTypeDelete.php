<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RestrictedContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RestrictedContentTypeModel();
}
}