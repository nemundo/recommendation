<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentTypeCollectionContentTypeId extends AbstractModelIdValue {
/**
* @var ContentTypeCollectionContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionContentTypeModel();
}
}