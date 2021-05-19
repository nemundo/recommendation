<?php
namespace Nemundo\Content\Data\ApplicationContentType;
use Nemundo\Model\Id\AbstractModelIdValue;
class ApplicationContentTypeId extends AbstractModelIdValue {
/**
* @var ApplicationContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationContentTypeModel();
}
}