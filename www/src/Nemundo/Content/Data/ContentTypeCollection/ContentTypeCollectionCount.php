<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentTypeCollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionModel();
}
}