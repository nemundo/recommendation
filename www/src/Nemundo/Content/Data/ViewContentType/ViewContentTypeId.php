<?php
namespace Nemundo\Content\Data\ViewContentType;
use Nemundo\Model\Id\AbstractModelIdValue;
class ViewContentTypeId extends AbstractModelIdValue {
/**
* @var ViewContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
}