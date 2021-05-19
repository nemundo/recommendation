<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentTypeCollectionContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionContentTypeModel();
}
}