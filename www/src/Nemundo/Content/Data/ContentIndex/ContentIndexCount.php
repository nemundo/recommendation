<?php
namespace Nemundo\Content\Data\ContentIndex;
class ContentIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentIndexModel();
}
}