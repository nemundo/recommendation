<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
use Nemundo\Model\Id\AbstractModelIdValue;
class RestrictedContentTypeId extends AbstractModelIdValue {
/**
* @var RestrictedContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RestrictedContentTypeModel();
}
}