<?php
namespace Nemundo\Content\Data\ViewContentType;
class ViewContentTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ViewContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
}