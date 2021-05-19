<?php
namespace Nemundo\Content\App\Explorer\Data\ExplorerContentType;
class ExplorerContentTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ExplorerContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ExplorerContentTypeModel();
}
}