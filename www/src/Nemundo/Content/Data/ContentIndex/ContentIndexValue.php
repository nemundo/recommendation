<?php
namespace Nemundo\Content\Data\ContentIndex;
class ContentIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContentIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentIndexModel();
}
}