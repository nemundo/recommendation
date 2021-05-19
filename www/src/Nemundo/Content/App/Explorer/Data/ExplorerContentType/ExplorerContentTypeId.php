<?php
namespace Nemundo\Content\App\Explorer\Data\ExplorerContentType;
use Nemundo\Model\Id\AbstractModelIdValue;
class ExplorerContentTypeId extends AbstractModelIdValue {
/**
* @var ExplorerContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ExplorerContentTypeModel();
}
}