<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ApplicationContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationContentTypeModel();
}
}