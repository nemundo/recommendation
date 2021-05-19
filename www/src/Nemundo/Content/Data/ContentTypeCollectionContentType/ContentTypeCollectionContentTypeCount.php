<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentTypeCollectionContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionContentTypeModel();
}
}