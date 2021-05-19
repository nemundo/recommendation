<?php
namespace Nemundo\Content\App\Explorer\Data\ExplorerContentType;
class ExplorerContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ExplorerContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ExplorerContentTypeModel();
}
}