<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ApplicationContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationContentTypeModel();
}
}