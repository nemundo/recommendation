<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentTypeCollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionModel();
}
}