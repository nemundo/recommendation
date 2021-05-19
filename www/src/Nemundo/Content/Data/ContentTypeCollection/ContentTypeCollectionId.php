<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentTypeCollectionId extends AbstractModelIdValue {
/**
* @var ContentTypeCollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionModel();
}
}