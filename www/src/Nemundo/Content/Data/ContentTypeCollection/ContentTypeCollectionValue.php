<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContentTypeCollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionModel();
}
}